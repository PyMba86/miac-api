<?php

namespace Miac\Client\Session\Handler;

use Exception;
use Miac\Client\Exception as ClientException;
use Miac\Client\Message\BaseWsMessage;
use ReflectionClass;
use SoapFault;

class DummySoapHeader extends Base {

    /**
     * @inheritdoc
     */
    protected function prepareForNextMessage($messageName, $messageOptions)
    {
        // TODO Установка soap заголовков
    }

    /**
     * @inheritdoc
     */
    protected function handlePostMessage($messageName, $lastResponse, $messageOptions, $result)
    {
        // TODO Чтение заголовков после отправки
    }

    /**
     * @inheritdoc
     */
    protected function makeSoapClientOptions()
    {
        $options = $this->soapClientOptions;
        $options['classmap'] = array_merge(Classmap::$soapheader, Classmap::$map);
        if (!empty($this->params->soapClientOptions)) {
            $options = array_merge($options, $this->params->soapClientOptions);
        }
        return $options;
    }


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

    public function sendMessage(string $messageName, BaseWsMessage $messageBody, $messageOptions): SendResult
    {
        $result = new SendResult();

        $this->prepareForNextMessage($messageName, $messageOptions);

        try {
            $dummyResponse = $this->getDummyFile($messageName . 'Response.xml');

            $xml = $this->extractor->extract($dummyResponse);

            $xml = preg_replace("/(<\/?)(\w+)*([^>]*>)/", "$1$2$3", $xml);
            $xml = preg_replace("/(\w+):([^>]*)/m", "$2", $xml);
            $xml = simplexml_load_string($xml);

            $result->responseObject = $xml;

            $this->handlePostMessage($messageName, $dummyResponse, $messageOptions, $result);

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
}