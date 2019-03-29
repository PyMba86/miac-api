<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\GetActualSpecialistListOptions;

/**
 * Получение списка специалистов МО
 * @package Miac\Client\Message
 */
class GetActualSpecialistList extends BaseWsMessage
{
    /** @var string код МО в системе ТФОМС */
    public $muCode;

    /**
     * Получить список специалистов МО
     * @param GetActualSpecialistListOptions $options
     */
    public function __construct(GetActualSpecialistListOptions $options)
    {
        $this->muCode = $options->muCode;
    }
}