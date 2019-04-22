<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\GetAppointmentsBySNILSOptions;

/**
 * Получение записей пациента по СНИЛС
 *
 * Возвращает последние 20 записей по указанному СНИЛС пациента
 * @package Miac\Client\Message
 */
class GetAppointmentsBySNILS extends BaseWsMessage
{
    /**
     * @var string
     */
    public $snils;

    /**
     * Получить данные о МО
     * @param GetAppointmentsBySNILSOptions $options
     */
    public function __construct(GetAppointmentsBySNILSOptions $options)
    {
        $this->snils = $options->snils;
    }

    public function __toString()
    {
        return $this->snils;
    }


}