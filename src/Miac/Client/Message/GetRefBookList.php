<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\GetRefBookListOptions;

/**
 * Получить список справочников
 * @package Miac\Client\Message
 */
class GetRefBookList extends BaseWsMessage
{
    /**
     * Получить данные о МО
     * @param GetRefBookListOptions $options
     */
    public function __construct(GetRefBookListOptions $options)
    {

    }


}