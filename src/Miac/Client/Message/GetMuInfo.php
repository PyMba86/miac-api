<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\GetMuInfoOptions;

/**
 * Получить данные о МО
 * @package Miac\Client\Message
 */
class GetMuInfo extends BaseWsMessage
{
    /**
     * @var string
     */
    public $muCode;

    /**
     * Получить данные о МО
     * @param GetMuInfoOptions $options
     */
    public function __construct(GetMuInfoOptions $options)
    {
        $this->muCode = $options->muCode;
    }
}