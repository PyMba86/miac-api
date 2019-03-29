<?php

namespace Miac\Client\RequestCreator;


use Miac\Client\InvalidMessageException;
use Miac\Client\Message\InvalidArgumentException;
use Miac\Client\Params\RequestCreatorParams;
use Miac\Client\RequestOptions\RequestOptionsInterface;
use Miac\Client\RequestCreator\Converter\ConvertInterface;

class Base implements RequestCreatorInterface
{
    /**
     * Parameters
     *
     * @var RequestCreatorParams
     */
    protected $params;
    /**
     * Associative array of messages (as keys) and versions (as values) that are present in the WSDL.
     *
     * @var array
     */
    protected $messagesAndVersions = [];
    /**
     * All message builders already instantiated
     *
     * @var array
     */
    protected $messageBuilders = [];
    /**
     * Base Request Creator constructor.
     *
     * @param RequestCreatorParams $params
     */
    public function __construct(RequestCreatorParams $params)
    {
        $this->params = $params;
        $this->messagesAndVersions = $params->messagesAndVersions;
    }

    /**
     * Create a request message for a given message with a set of options.
     *
     * @param string $messageName the message name as named in the WSDL
     * @param RequestOptionsInterface $params
     * @throws InvalidArgumentException When invalid input is detected during message creation.
     * @return mixed the created request
     */
    public function createRequest($messageName, RequestOptionsInterface $params)
    {
        $builder = $this->findBuilderForMessage($messageName);
        if ($builder instanceof ConvertInterface) {
            return $builder->convert($params);
        } else {
            throw new \RuntimeException('No builder found for message '.$messageName);
        }
    }

    /**
     * Find the correct builder for a given message
     *
     * Builder classes implement the ConvertInterface and are used to build only one kind of message.
     *
     * The standard converter class is
     * __NAMESPACE__ \ Converter \ Sectionname \ Messagename + "Conv"
     * e.g.
     * Amadeus\Client\RequestCreator\Converter\DocIssuance\IssueTicketConv
     *
     * @param string $messageName
     * @return ConvertInterface|null
     */
    protected function findBuilderForMessage($messageName)
    {
        $builder = null;
        if (array_key_exists($messageName, $this->messageBuilders) &&
            $this->messageBuilders[$messageName] instanceof ConvertInterface
        ) {
            $builder = $this->messageBuilders[$messageName];
        } else {
            $builderClass = __NAMESPACE__.'\\Converter\\'.$messageName."Conv";
            if (class_exists($builderClass)) {
                /** @var ConvertInterface $builder */
                $builder = new $builderClass();
                $builder->setParams($this->params);
                $this->messageBuilders[$messageName] = $builder;
            }
        }
        return $builder;
    }


}