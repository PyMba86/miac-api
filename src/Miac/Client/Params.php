<?php

namespace Miac\Client;

use Miac\Client\Params\RequestCreatorParams;
use Miac\Client\Params\SessionHandlerParams;
use Miac\Client\RequestCreator\RequestCreatorInterface;
use Miac\Client\ResponseHandler\ResponseHandlerInterface;
use Miac\Client\Session\Handler\HandlerInterface;

/**
 * Параметры клиента
 *
 * @package Miac\Client
 */
class Params
{
    /**
     * Для введения пользовательского построителя запросов
     *
     * @var RequestCreatorInterface
     */
    public $requestCreator;

    /**
     * Для введения пользовательского обработчика сеанса
     *
     * @var HandlerInterface
     */
    public $sessionHandler;

    /**
     * Для введения пользовательского обработчика ответа
     *
     * @var ResponseHandlerInterface
     */
    public $responseHandler;

    /**
     * Параметры, необходимые для создания обработчика сеанса
     *
     * @var SessionHandlerParams
     */
    public $sessionHandlerParams;

    /**
     * Параметры, необходимые  для создания построителя запросов
     *
     * @var RequestCreatorParams
     */
    public $requestCreatorParams;

    /**
     * Запрашивать ли ответную XML-строку в ответе по умолчанию или нет.
     *
     * Если true, объект Amadeus \ Client \ Result будет
     * содержат ответное XML-сообщение в свойстве responseXml по умолчанию.
     *
     * Это может быть переопределено для определенных сообщений, добавив ключ returnXml с логическим значением в
     * второй параметр сообщения вызова.
     *
     * @var bool
     */
    public $returnXml = true;

    /**
     * Создать обьект с параметрами
     *
     * @param array $params
     */
    public function __construct($params = [])
    {
        $this->loadFromArray($params);
    }

    /**
     * Загрузить параметры из ассоциативного массива
     *
     * @param array $params
     */
    protected function loadFromArray(array $params) {

        if (isset($params['returnXml']) && is_bool($params['returnXml'])) {
            $this->returnXml = $params['returnXml'];
        }

        $this->loadRequestCreator($params);
        $this->loadSessionHandler($params);
        $this->loadResponseHandler($params);

        $this->loadSessionHandlerParams($params);
        $this->loadRequestCreatorParams($params);
    }

    /**
     * Load Request Creator
     *
     * @param array $params
     * @return void
     */
    protected function loadRequestCreator($params)
    {
        if (isset($params['requestCreator']) && $params['requestCreator'] instanceof RequestCreatorInterface) {
            $this->requestCreator = $params['requestCreator'];
        }
    }

    /**
     * Load Session Handler
     *
     * @param array $params
     * @return void
     */
    protected function loadSessionHandler($params)
    {
        if (isset($params['sessionHandler']) && $params['sessionHandler'] instanceof Session\Handler\HandlerInterface) {
            $this->sessionHandler = $params['sessionHandler'];
        }
    }

    /**
     * Load Response Handler
     *
     * @param array $params
     * @return void
     */
    protected function loadResponseHandler($params)
    {
        if (isset($params['responseHandler']) && $params['responseHandler'] instanceof ResponseHandlerInterface) {
            $this->responseHandler = $params['responseHandler'];
        }
    }

    /**
     * Load Session Handler Parameters
     *
     * @param array $params
     * @return void
     */
    protected function loadSessionHandlerParams($params)
    {
        if (isset($params['sessionHandlerParams'])) {
            if ($params['sessionHandlerParams'] instanceof SessionHandlerParams) {
                $this->sessionHandlerParams = $params['sessionHandlerParams'];
            } elseif (is_array($params['sessionHandlerParams'])) {
                $this->sessionHandlerParams = new SessionHandlerParams($params['sessionHandlerParams']);
            }
        }
    }

    /**
     * Load Request Creator Parameters
     *
     * @param array $params
     * @return void
     */
    protected function loadRequestCreatorParams($params)
    {
        if (isset($params['requestCreatorParams'])) {
            if ($params['requestCreatorParams'] instanceof RequestCreatorParams) {
                $this->requestCreatorParams = $params['requestCreatorParams'];
            } elseif (is_array($params['requestCreatorParams'])) {
                $this->requestCreatorParams = new RequestCreatorParams($params['requestCreatorParams']);
            }
        }
    }

}