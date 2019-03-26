<?php

namespace Miac;

use Miac\Client\Base;
use Miac\Client\Params;
use Miac\Client\RequestOptions\RequestOptionsInterface;

/**
 * Клиент
 * @package PyMba86\Miac
 */
class Client extends Base
{
    /** @var string */
    protected $lastMessage;

    /**
     * Конструктор клиента МИАЦ
     * @param Params $params
     */
    public function __construct(Params $params)
    {
        $this->loadClientParams($params);
    }

    /**
     * Вызов сообщения с параметрами
     *
     * @param string $messageName
     * @param RequestOptionsInterface $options
     * @param $messageOptions
     * @param bool $endSession
     * @return Client\Result
     * @throws Client\InvalidMessageException
     * @throws Client\Exception
     */
    protected function callMessage(string $messageName, RequestOptionsInterface $options,
                                   $messageOptions, bool $endSession = false)
    {

        $messageOptions = $this->makeMessageOptions($messageOptions, $endSession);

        $this->lastMessage = $messageName;

        $sendResult = $this->sessionHandler->sendMessage(
            $messageName,
            $this->requestCreator->createRequest($messageName, $options),
            $messageOptions);

        $response = $this->responseHandler->analyzeResponse($sendResult, $messageName);

        if ($messageOptions['returnXml'] === false) {
            $response->responseXml = null;
        }

        return $response;
    }


    protected function makeMessageOptions(array $incoming, $endSession = false)
    {
        $options = [
            'endSession' => $endSession,
            'returnXml' => $this->returnResultXml
        ];
        if (array_key_exists('endSession', $incoming)) {
            $options['endSession'] = $incoming['endSession'];
        }
        if (array_key_exists('returnXml', $incoming)) {
            $options['returnXml'] = $incoming['returnXml'];
        }
        return $options;
    }
}