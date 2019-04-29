<?php

namespace Miac\Client\ResponseHandler;

use const Grpc\STATUS_OK;
use Miac\Client\Exception;
use Miac\Client\Result;
use Miac\Client\Session\Handler\SendResult;

/**
 * Стандартный обработчик ответа для отдельного сообщения.
 * @package Miac\Client\ResponseHandler
 */
abstract class StandardResponseHandler implements MessageResponseHandler
{

    /**
     * Анализирует ответ просматривая ошибку, категорию и сообщение в обьявленных названиях нодах
     *
     * @param SendResult $response
     * @param string $nodeError Название ноды содержащий код ошибки (первый элемент в ответе)
     * @param string $nodeMessage Название ноды содержащий сообщение ошибки (все ноды в ответе)
     * @return Result
     * @throws Exception
     */
    protected function analyzeWithErrCodeCategoryMsgNodeName(SendResult $response, string $nodeError, string $nodeMessage)
    {
        $analyzeResponse = new Result($response);
        $domDoc = $this->loadDomDocument($response->responseXml);
        $errorCodeNode = $domDoc->getElementsByTagName($nodeError)->item(0);

        if (!is_null($errorCodeNode)) {
            $errorCode = $errorCodeNode->nodeValue;
            $analyzeResponse->status = $this->makeStatusFromErrorQualifier($errorCode);

            $errorTextNodeList = $domDoc->getElementsByTagName($nodeMessage);

            $analyzeResponse->messages[] = new Result\NotOk(
                $errorCode,
                $this->makeMessageFromMessagesNodeList($errorTextNodeList)
            );
        }

        return $analyzeResponse;
    }

    /**
     * Анализирует ответ
     *
     * @param SendResult $response
     * @return Result
     */
    protected function analyzeSimpleResponseMessage(SendResult $response)
    {
        $analyzeResponse = new Result($response);
        $analyzeResponse->status = Result::STATUS_OK;
        return $analyzeResponse;
    }



    /**
     * @param SendResult $response
     * @return Result
     * @throws Exception
     */
    protected function analyzeSimpleResponseErrorCodeAndMessage(SendResult $response)
    {
        return $this->analyzeWithErrCodeCategoryMsgNodeName(
            $response,
            "ErrorCode",
            "ErrorText"
        );
    }

    /**
     * @param SendResult $response
     * @return Result
     * @throws Exception
     */
    protected function analyzeSimpleResponseErrorCodeAndMessageStatusCode(SendResult $response)
    {
        return $this->analyzeWithErrCodeCategoryMsgNodeName(
            $response,
            "ErrorCode",
            "ErrorText"
        );
    }

    /**
     * Загрузить xml документ
     *
     * @param string $response
     * @return \DOMDocument
     * @throws Exception Когда есть проблемы при загрузке сообщения
     */
    protected function loadDomDocument(string $response)
    {
        $domDoc = new \DOMDocument('1.0', 'UTF-8');
        $loadResult = $domDoc->loadXML($response);
        if ($loadResult === false) {
            throw new Exception("Could not load response message into DOMDocument");
        }
        return $domDoc;
    }

    /**
     * Конвертировать статус код, который был найден в сообшении в статус уровень
     *
     * Если нода не найдена, будет установлен уровень по умолчанию
     * @param $qualifier
     * @param string $defaultStatus
     * @return mixed|string
     */
    protected function makeStatusFromErrorQualifier($qualifier, $defaultStatus = Result::STATUS_ERROR)
    {
        $statusQualMapping = [
            "0" => Result::STATUS_OK
        ];
        if (array_key_exists($qualifier, $statusQualMapping)) {
            $status = $statusQualMapping[$qualifier];
        } else {
            $status = $defaultStatus;
        }

        return $status;
    }

    /**
     * Конвертировать DomNodeList который содержит сообщения об ошибке в строку
     * @param \DOMNodeList $errorTextNodeList
     * @return string
     */
    protected function makeMessageFromMessagesNodeList(\DOMNodeList $errorTextNodeList)
    {
        return implode(
            ' - ',
            array_map(
                function ($item) {
                    return trim($item->nodeValue);
                },
                iterator_to_array($errorTextNodeList)
            )
        );
    }
}