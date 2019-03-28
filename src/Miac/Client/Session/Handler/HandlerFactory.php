<?php

namespace Miac\Client\Session\Handler;

use Miac\Client\Params\SessionHandlerParams;

/**
 * Создает правильный обработчик сеанса по параметрам
 * @package Miac\Miac\Client\Session\Handler
 */
class HandlerFactory
{

    public static function createHandler(SessionHandlerParams $handlerParams)
    {
        if (!($handlerParams instanceof SessionHandlerParams))
            throw new \InvalidArgumentException('Invalid parameters');

        return new SoapHeader($handlerParams);
    }

}