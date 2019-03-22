<?php

namespace Miac\Client\Handler;

use Miac\Client\Params\SessionHandlerParams;
use Miac\Client\Session\Handler\HandlerInterface;

/**
 * Базовый клиент
 * Обработчик сеанса будет управлять всем, что связано с сеансом
 * @package Miac\Client
 */
abstract class Base implements HandlerInterface
{
    /**
     * @var SessionHandlerParams
     */
    protected $params;
}