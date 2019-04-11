<?php

namespace Miac\Client\Message;

use Miac\Client\Message\GetSlotListByPeriod\Period;
use Miac\Client\RequestOptions\GetSlotListByPeriodOptions;

/**
 * Получение списка слотов за период
 * @package Miac\Client\Message
 */
class GetSlotListByPeriod extends BaseWsMessage
{
    /** @var string код МО в системе ТФОМС */
    public $muCode;

    /** @var string код отделения */
    public $depCode;

    /** @var string номер кабинета */
    public $snils;

    /** @var string код врача */
    public $profCode;

    /** @var string код позиции */
    public $positionCode;

    /** @var Period Период */
    public $period;

    /**
     * Получить данные о расписании
     * @param GetSlotListByPeriodOptions $options
     */
    public function __construct(GetSlotListByPeriodOptions $options)
    {
        $this->muCode = $options->muCode;
        $this->depCode = $options->depCode;
        $this->snils = $options->snils;
        $this->profCode = $options->profCode;
        $this->positionCode = $options->positionCode;
        $this->period = new  Period($options->beginDate, $options->endDate);
    }
}