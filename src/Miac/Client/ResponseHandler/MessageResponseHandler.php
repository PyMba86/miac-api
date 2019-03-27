<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Exception;
use Miac\Client\Result;
use Miac\Client\Session\Handler\SendResult;

/**
 * MessageResponseHandler
 *
 * Интерфейс, используемый для реализации анализа ответа от конкретного ответа сообщения веб-службы.
 *
 * @package Miac\Client\ResponseHandler
 */
interface MessageResponseHandler
{
    /**
     * Анализирует результат операции с сообщением и проверяет наличие ошибок
     * @param SendResult $response
     * @throws Exception
     * @return Result
     */
    public function analyze(SendResult $response);
}