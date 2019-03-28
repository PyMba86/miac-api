<?php

namespace Miac\Client\Session\Handler;

use Exception;
use Miac\Client\Exception as ClientException;
use Miac\Client\InvalidWsdlFileException;
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
     * @var array[string]\SoapClient
     */
    protected $soapClients = [];

    /**
     * @var SessionHandlerParams
     */
    protected $params;

    /**
     * @var MsgBodyExtractor
     */
    protected $extractor;

    /**
     * A map of which messages are available in the provided WSDL's
     *
     * format:
     * [
     *      'PNR_Retrieve' => [
     *          'version' => '14.1',
     *          'wsdl' => '7d36c7b8'
     *      ],
     *      'Media_GetMedia' => [
     *          'version' => '14.1',
     *          'wsdl' => '7e84f2537'
     *      ]
     * ]
     *
     * @var array
     */
    protected $messagesAndVersions = [];

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

        if ($params->overrideSoapClient instanceof \SoapClient) {
            $this->soapClients[$params->overrideSoapClientWsdlName] = $params->overrideSoapClient;
        }

        $this->setStateful($params->stateful);
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
            // Вызов SOAP метода
            $result->responseObject = $this->getSoapClient($messageName)->$messageName($messageBody);

            $this->handlePostMessage($messageName, $this->getLastResponse($messageName), $messageOptions, $result);

        } catch (SoapFault $exception) {
            $result->exception = $exception;
        } catch (Exception $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        // TODO Зачем нам вытаскивать сырой xml
        $result->responseXml = $this->extractor->extract($this->getLastResponse($messageName));

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
     * Get the WSDL ID for the given message
     *
     * @param $messageName
     * @return string|null
     * @throws InvalidWsdlFileException
     */
    protected function getWsdlIdFor($messageName)
    {
        $msgAndVer = $this->getMessagesAndVersions();
        if (isset($msgAndVer[$messageName]) && isset($msgAndVer[$messageName]['wsdl'])) {
            return $msgAndVer[$messageName]['wsdl'];
        }
        return null;
    }

    /**
     * Получите соответствующий SoapClient для данного сообщения
     * @param $msgName
     * @return mixed|null
     * @throws InvalidWsdlFileException
     */
    protected function getSoapClient($msgName) {
        $wsdlId = $this->getWsdlIdFor($msgName);

        if (!empty($msgName)) {
            // FIXME Убрать создание клиента на основе версий - Один клиент = Портал! Без версий
            if (!isset($this->soapClients[$wsdlId]) || !($this->soapClients[$wsdlId] instanceof SoapClient)) {
                $this->soapClients[$wsdlId] = $this->initSoapClient($wsdlId);
            }
            return $this->soapClients[$wsdlId];
        } else {
            return null;
        }
    }

    /**
     * Extract the Messages and versions from the loaded WSDL file.
     *
     * Result is an associative array: keys are message names, values are versions.
     *
     * @return array
     * @throws InvalidWsdlFileException
     */
    public function getMessagesAndVersions()
    {
        if (empty($this->messagesAndVersions)) {
            $this->messagesAndVersions = WsdlAnalyser::loadMessagesAndVersions($this->params->wsdl);
        }
        return $this->messagesAndVersions;
    }


    /**
     * Инициализация клиента по wsdl id
     * @param $wsdlId
     * @return BaseSoapClient
     */
    protected function initSoapClient($wsdlId) {
        $wsdlPath = WsdlAnalyser::$wsdlIds[$wsdlId];

        $client = new BaseSoapClient($wsdlPath,$this->makeSoapClientOptions());

        return $client;
    }

    /**
     * Make Soap Header specific SoapClient options
     *
     * @return array
     */
    abstract protected function makeSoapClientOptions();


    /**
     * Execute a method on the native SoapClient
     *
     * @param string $msgName
     * @param string $method
     * @return null|string
     * @throws InvalidWsdlFileException
     */
    protected function executeMethodOnSoapClientForMsg($msgName, $method)
    {
        $result = null;
        $soapClient = $this->getSoapClient($msgName);
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
     * @throws InvalidWsdlFileException
     */
    public function getLastRequest($msgName)
    {
        return $this->executeMethodOnSoapClientForMsg(
            $msgName,
            '__getLastRequest'
        );
    }

    /**
     * Get the last raw XML message that was received
     *
     * @param string $msgName
     * @return string|null
     * @throws InvalidWsdlFileException
     */
    public function getLastResponse($msgName)
    {
        return $this->executeMethodOnSoapClientForMsg(
            $msgName,
            '__getLastResponse'
        );
    }

    /**
     * Get the request headers for the last SOAP message that was sent out
     *
     * @param string $msgName
     * @return string|null
     * @throws InvalidWsdlFileException
     */
    public function getLastRequestHeaders($msgName)
    {
        return $this->executeMethodOnSoapClientForMsg(
            $msgName,
            '__getLastRequestHeaders'
        );
    }

    /**
     * Get the response headers for the last SOAP message that was received
     *
     * @param string $msgName
     * @return string|null
     * @throws InvalidWsdlFileException
     */
    public function getLastResponseHeaders($msgName)
    {
        return $this->executeMethodOnSoapClientForMsg(
            $msgName,
            '__getLastResponseHeaders'
        );
    }

}