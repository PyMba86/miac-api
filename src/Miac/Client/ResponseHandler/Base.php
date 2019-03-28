<?php

namespace Miac\Client\ResponseHandler;

use Exception;
use Miac\Client\Result;
use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа по умолчанию
 *
 * Анализирует ответы, полученные от сервера МИАЦ, и проверяет наличие сообщений об ошибках.
 * Если обнаружены ошибки, информация об ошибке будет извлечена и статус ответа будет изменен соответстенно.
 *
 * @package Miac\Client\ResponseHandler
 */
class Base implements ResponseHandlerInterface
{
    /**
     * Список обработчиков ответа
     *
     * @var array
     */
    protected $responseHandlers = [];

    /**
     * @inheritdoc
     */
    public function analyzeResponse(SendResult $sendResult, string $messageName)
    {
        if (!empty($sendResult->exception)) {
            return $this->makeResultForException($sendResult);
        }

        // Ищем обработчик ответа по неймспейсу класса
        $handler = $this->findHandlerForMessage($messageName);

        if ($handler instanceof MessageResponseHandler) {
            return $handler->analyze($sendResult);
        } else {
            return new Result($sendResult, Result::STATUS_UNKNOWN);
        }
    }

    /**
     * Создать результат ответа с исключением
     * @param SendResult $sendResult
     * @return Result
     */
    protected function makeResultForException(SendResult $sendResult)
    {
        $result = new Result($sendResult, Result::STATUS_FATAL);
        $result->messages[] = $this->makeMessageFromException($sendResult->exception);
        return $result;
    }

    /**
     * Создать сообщение с исключением
     * @param Exception $exception
     * @return Result\NotOk
     */
    protected function makeMessageFromException(Exception $exception)
    {
        $message = new Result\NotOk();

        if ($exception instanceof \SoapFault) {
            $info = explode('|', $exception->getMessage());
            if (count($info) === 3) {
                $message->code = $info[0];
                $message->level = $info[1];
                $message->text = $info[2];
            }
        }

        return $message;
    }

    /**
     * Поиск или создание обработчика ответа по названию сообщения(метода)
     * @param string $messageName
     * @return MessageResponseHandler|null
     */
    protected function findHandlerForMessage(string $messageName)
    {
        if (array_key_exists($messageName, $this->responseHandlers) &&
            $this->responseHandlers[$messageName] instanceof MessageResponseHandler) {
            return $this->responseHandlers[$messageName];
        } else {
            $section = substr($messageName, 0, strpos($messageName, '_'));
            $message = substr($messageName, strpos($messageName, '_') + 1);

            $handlerClass = __NAMESPACE__ . '\\' . $section . '\\Handler' . $message;

            if (class_exists($handlerClass)) {
                $handler = new $handlerClass();
                $this->responseHandlers[$messageName] = $handler;
                return $handler;
            } else {
                return null;
            }
        }
    }
}