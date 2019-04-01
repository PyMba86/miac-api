<?php

namespace Miac\Client\Session\Handler;

use Exception;
use Miac\Client\Exception as ClientException;
use Miac\Client\Message\BaseWsMessage;
use Miac\Client\Params\SessionHandlerParams;
use Miac\Client\SoapClient as BaseSoapClient;
use Miac\Client\Util\MsgBodyExtractor;
use SoapClient;
use SoapFault;

/**
 * Базовый клиент
 * Обработчик сеанса будет управлять всем, что связано с сеансом
 * @package Miac\Client
 */
abstract class Base implements HandlerInterface
{
    /**
     * @var SoapClient
     */
    protected $soapClient;

    /**
     * @var SessionHandlerParams
     */
    protected $params;

    /**
     * @var MsgBodyExtractor
     */
    protected $extractor;

    /**
     * Стандартные параметры SOAP клиента
     *
     * @var array
     */
    protected $soapClientOptions = [
        'trace' => 1,
        'exceptions' => 1,
        'soap_version' => SOAP_1_1
    ];

    /**
     * Base constructor.
     * @param SessionHandlerParams $params
     */
    public function __construct(SessionHandlerParams $params)
    {
        $this->params = $params;
        $this->setStateful($params->stateful);
        // TODO Выташить создание клиента наружу
        $this->soapClient = new BaseSoapClient($this->params->wsdl,$this->makeSoapClientOptions());
        $this->extractor = new MsgBodyExtractor();
    }

    /**
     * @inheritdoc
     * @throws ClientException
     */
    public function sendMessage(string $messageName, BaseWsMessage $messageBody, $messageOptions): SendResult
    {
        $result = new SendResult();

        $this->prepareForNextMessage($messageName, $messageOptions);

        try {
            $result->responseObject = $this->soapClient->$messageName($messageBody);

            $this->handlePostMessage($messageName, $this->getLastResponse(), $messageOptions, $result);

        } catch (SoapFault $exception) {
            $result->exception = $exception;
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        // TODO Зачем нам вытаскивать сырой xml
        $result->responseXml = $this->extractor->extract($this->getLastResponse());

        return $result;

    }

    /**
     * Подготовить сообщение перед отправкой
     *
     * @param string $messageName
     * @param array $messageOptions
     */
    abstract protected function prepareForNextMessage($messageName, $messageOptions);

    /**
     * Обработать сообщение после отправки
     *
     * Обрабатывает состояние сеанса на основе полученного ответа
     *
     * @param string $messageName
     * @param string $lastResponse
     * @param array $messageOptions
     * @param mixed $result
     */
    abstract protected function handlePostMessage($messageName, $lastResponse, $messageOptions, $result);

    /**
     * Make Soap Header specific SoapClient options
     *
     * @return array
     */
    abstract protected function makeSoapClientOptions();

    /**
     * Execute a method on the native SoapClient
     *
     * @param string $method
     * @return null|string
     */
    protected function executeMethodOnSoapClientForMsg($method)
    {
        $result = null;
        $soapClient = $this->soapClient;
        if ($soapClient instanceof \SoapClient) {
            $result = $soapClient->$method();
        }
        return $result;
    }

    /**
     * Get the last raw XML message that was sent out
     *
     * @param string $msgName
     * @return string|null
     */
    public function getLastRequest($msgName)
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastRequest'
        );
    }

    /**
     * Get the last raw XML message that was received
     *
     * @return string|null
     */
    public function getLastResponse()
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastResponse'
        );
    }

    /**
     * Get the request headers for the last SOAP message that was sent out
     *
     * @return string|null
     */
    public function getLastRequestHeaders()
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastRequestHeaders'
        );
    }

    /**
     * Get the response headers for the last SOAP message that was received
     *
     * @return string|null
     */
    public function getLastResponseHeaders()
    {
        return $this->executeMethodOnSoapClientForMsg(
            '__getLastResponseHeaders'
        );
    }

}