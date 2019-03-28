<?php

namespace Miac\Client;

use Miac\Client\RequestCreator\RequestCreatorInterface;
use Miac\Client\ResponseHandler\ResponseHandlerInterface;
use Miac\Client\Session\Handler\HandlerInterface;
use Miac\Miac\Client\Session\Handler\HandlerFactory;

/**
 * Base Client
 *
 * Ответственный за загрузку параметров конструктора
 *
 * @package Miac\Client
 */
class Base
{
    /**
     * Обработчик сеансов будет отправлять все сообщения и обрабатывать все связанные с сеансом вещи.
     *
     * @var HandlerInterface
     */
    protected $sessionHandler;

    /**
     * Построитель запросов создает правильную структуру сообщения для отправки на сервер SOAP.
     *
     * @var RequestCreatorInterface
     */
    protected $requestCreator;

    /**
     * Обработчик ответов проверит полученный ответ на наличие ошибок.
     *
     * @var ResponseHandlerInterface
     */
    protected $responseHandler;

    /**
     * Возвращать ли ответ сообщения как XML, так и PHP-объект
     *
     * @var bool
     */
    protected $returnResultXml;

    /**
     * Загрузка параметров клиента
     * @param Params $params
     */
    protected function loadClientParams(Params $params)
    {
        $this->sessionHandler = $this->loadSessionHandler(
            $params->sessionHandler,
            $params->sessionHandlerParams
        );

        $this->requestCreator = $this->loadRequestCreator(
            $params->requestCreator,
            $params->requestCreatorParams
        );

        $this->responseHandler = $this->loadResponseHandler(
            $params->responseHandler
        );

        $this->returnResultXml = $params->returnXml;
    }

    /**
     * Загрузка обработчика сеанса
     *
     * Либо загрузите предоставленный обработчик сеанса, либо создайте его в зависимости от входящих параметров.
     *
     * @param HandlerInterface|null $sessionHandler
     * @param Params\SessionHandlerParams|null $params
     * @return HandlerInterface
     */
    protected function loadSessionHandler($sessionHandler, $params)
    {
        if ($sessionHandler instanceof HandlerInterface) {
            $newSessionHandler = $sessionHandler;
        } else {
            $newSessionHandler = HandlerFactory::createHandler($params);
        }

        return $newSessionHandler;
    }

    /**
     * Загрузка построителя запросов
     *
     * Создатель запроса отвечает за генерацию правильного запроса на отправку.
     *
     * @param RequestCreatorInterface|null $requestCreator
     * @param Params\RequestCreatorParams $params
     * @return RequestCreatorInterface
     */
    protected function loadRequestCreator($requestCreator, $params)
    {
        if ($requestCreator instanceof RequestCreatorInterface) {
            $newRequestCreator = $requestCreator;
        } else {
            $newRequestCreator = RequestCreatorFactory::createRequestCreator($params);
        }

        return $newRequestCreator;
    }

    /**
     * Загрузка обработчика ответа
     *
     * @param ResponseHandlerInterface|null $responseHandler
     * @return ResponseHandlerInterface
     * @throws \RuntimeException
     */
    protected function loadResponseHandler($responseHandler)
    {
        if ($responseHandler instanceof ResponseHandlerInterface) {
            $newResponseHandler = $responseHandler;
        } else {
            $newResponseHandler = new ResponseHandlerBase();
        }

        return $newResponseHandler;
    }

}