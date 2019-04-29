<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\GetRefBookPartsOptions;

/**
 * Получить количество частей в справочнике
 * @package Miac\Client\Message
 */
class GetRefBookParts extends BaseWsMessage
{

    /** @var string справочника */
    public $code;

    /** @var string версия */
    public $version;

    /**
     * Получить данные о МО
     * @param GetRefBookPartsOptions $options
     */
    public function __construct(GetRefBookPartsOptions $options)
    {
        $this->code = $options->code;
        $this->version = $options->version;
    }
}