<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\GetRefBookPartialOptions;

/**
 * Получить информацию со справочника
 * @package Miac\Client\Message
 */
class GetRefBookPartial extends BaseWsMessage
{

    /** @var string справочника */
    public $code;

    /** @var string версия */
    public $version;

    /** @var string часть справочника */
    public $part;

    /**
     * Получить данные о МО
     * @param GetRefBookPartialOptions $options
     */
    public function __construct(GetRefBookPartialOptions $options)
    {
        $this->code = $options->code;
        $this->version = $options->version;
        $this->part = $options->part;
    }
}