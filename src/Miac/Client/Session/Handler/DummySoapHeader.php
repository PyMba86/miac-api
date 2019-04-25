<?php

namespace Miac\Client\Session\Handler;

use Exception;
use Miac\Client\Exception as ClientException;
use Miac\Client\Message\BaseWsMessage;
use Miac\Client\Params\SessionHandlerParams;
use Miac\Client\Util\MsgBodyExtractor;
use ReflectionClass;
use SoapClient;
use SoapFault;

class DummySoapHeader implements HandlerInterface {

    /**
     * @var SessionHandlerParams
     */
    protected $params;


    /**
     * @var MsgBodyExtractor
     */
    protected $extractor;

    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function setStateful($stateful): void
    {
        if ($stateful === false) {
            throw new \Exception('Stateful messages are mandatory on SoapHeader');
        }
    }

    /**
     * @inheritdoc
     */
    public function isStateful()
    {
        return true;
    }

    /**
     * @inheritdoc
     * @throws ClientException
     */
    public function sendMessage(string $messageName, BaseWsMessage $messageBody, $messageOptions): SendResult
    {
        $result = new SendResult();


        try {
            $dummyResponse = $this->getDummyFile($messageName . 'Response.xml');

            $xml = $this->extractor->extract($dummyResponse);

            $xml = preg_replace("/(<\/?)(\w+)*([^>]*>)/", "$1$2$3", $xml);
            $xml = preg_replace("/([a-zA-Z]+)([0-9]+):([^>]*)/m", "$3", $xml);
            $xml = preg_replace("/(<[\w]+)([^>]*?)([\/?]?>)/m", "$1$3", $xml);
            $xml = simplexml_load_string($xml);
            $result->responseObject = $xml;


            $result->responseXml = $this->extractor->extract($dummyResponse);

        } catch (SoapFault $exception) {
            $result->exception = $exception;
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return $result;
    }

    /**
     * @param $fileName
     * @return false|string
     * @throws \ReflectionException
     */
    protected function getDummyFile($fileName)
    {
        $reflector = new ReflectionClass(get_class($this));
        $path = dirname($reflector->getFileName());
        $fullPath = realpath($path . DIRECTORY_SEPARATOR . "dummy" . DIRECTORY_SEPARATOR . $fileName);
        return file_get_contents($fullPath);
    }

    /**
     * HandlerInterface constructor.
     * @param SessionHandlerParams $params
     * @throws Exception
     */
    public function __construct(SessionHandlerParams $params)
    {
        $this->params = $params;
        $this->setStateful($params->stateful);
        $this->extractor = new MsgBodyExtractor();
    }

    /**
     * Get the last raw XML message that was sent out
     *
     * @param string $msgName
     * @return string|null
     */
    public function getLastRequest($msgName)
    {
       return null;
    }

    /**
     * Get the last raw XML message that was received
     *
     * @return string|null
     */
    public function getLastResponse()
    {
        return null;
    }

    /**
     * Get the request headers for the last SOAP message that was sent out
     *
     * @return string|null
     */
    public function getLastRequestHeaders()
    {
        return null;
    }

    /**
     * Get the response headers for the last SOAP message that was received
     *
     * @return string|null
     */
    public function getLastResponseHeaders()
    {
        return null;
    }
}