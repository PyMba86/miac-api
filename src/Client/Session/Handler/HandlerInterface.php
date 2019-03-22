<?php

namespace Miac\Client\Session\Handler;

use Miac\Client\Params\SessionHandlerParams;
use Miac\Struct\BaseWsMessage;

/**
 * Интерфейс обработчика сессии
 *
 * @package Miac\Client\Session
 */
interface HandlerInterface
{
    /**
     * HandlerInterface constructor.
     * @param SessionHandlerParams $params
     */
    public function __construct(SessionHandlerParams $params);

    /**
     * Отправка сообщения на сервер
     * @param string $messageName
     * @param BaseWsMessage $messageBody
     * @param array $messageOptions
     * @return SendResult
     */
    public function sendMessage(string $messageName, BaseWsMessage $messageBody, $messageOptions): SendResult;

    /**
     * Установка параметра stateful
     * @param $stateful
     * @return void
     */
    public function setStateful($stateful): void;

    /**
     * Get the current stateful mode (true is stateful, false is stateless)
     *
     * @return bool
     */
    public function isStateful();

    /**
     * Get the last raw XML message that was sent out
     *
     * @param string $msgName
     * @return string|null
     */
    public function getLastRequest($msgName);

    /**
     * Get the last raw XML message that was received
     *
     * @param string $msgName
     * @return string|null
     */
    public function getLastResponse($msgName);

    /**
     * Get the request headers for the last SOAP message that was sent out
     *
     * @param string $msgName
     * @return string|null
     */
    public function getLastRequestHeaders($msgName);

    /**
     * Get the response headers for the last SOAP message that was received
     *
     * @param string $msgName
     * @return string|null
     */
    public function getLastResponseHeaders($msgName);

}