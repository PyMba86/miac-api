<?php

namespace Miac\Client\Message\GetSlotByPeriod;

use DateTime;

/**
 * Временной отрезок в который слоты могут входить
 *
 * @package Miac\Client\Message\Slot\GetSlotByPeriod
 */
class SlotPeriod
{
    /**
     * Начальная дата периода
     * @var DateTime
     */
    public $beginDate;

    /**
     * Конечная дата периода
     * @var DateTime
     */
    public $endDate;

    /**
     * Временной отрезок для списка слотов
     * @param DateTime $beginDate
     * @param DateTime $endDate
     */
    public function __construct(DateTime $beginDate, DateTime $endDate)
    {
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
    }


}