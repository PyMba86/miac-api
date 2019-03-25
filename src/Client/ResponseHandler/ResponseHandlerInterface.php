<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Exception;
use Miac\Client\Result;
use Miac\Client\Session\Handler\SendResult;

/**
 * Интерфейс обработкчика ответа
 *
 * @package Miac\Client\ResponseHandler
 */
interface ResponseHandlerInterface
{
    /**
     * Анализирует ответ от сервера и сгенерирует исключение при обнаружении ошибки.
     * @param SendResult $sendResult Результат отправки из обработчика сеанса
     * @param string $messageName Сообщение, которое было вызвано
     *
     * @throws Exception Когда обнаружена ошибка
     * @throws \RuntimeException Когда возникает проблема с вызовом обработчика ответа
     * @return Result Сформированный ответ от сервера
     */
    public function analyzeResponse(SendResult $sendResult, string $messageName);
}