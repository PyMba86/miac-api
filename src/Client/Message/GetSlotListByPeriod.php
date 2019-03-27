<?php

namespace Miac\Client\Message\Slot;


use Miac\Client\Message\BaseWsMessage;
use Miac\Client\Message\Slot\GetSlotByPeriod\SlotPeriod;
use Miac\Client\RequestOptions\GetSlotListByPeriodOptions;

/**
 * Получить список слотов(талонов) за определенный период
 * Общая продолжительность запрашиваемого периода должна быть не более чем 21 день.
 *
 * @package Miac\Client\Message\Slot
 */
class GetSlotListByPeriod extends BaseWsMessage
{
    /** @var string код МО в системе ТФОМС */
    public $muCode;

    /** @var string код отделения внутри МО */
    public $depCode;

    /** @var string СНИЛС специалиста */
    public $snils;

    /** @var string код специалиста */
    public $profCode;

    /** @var string код должности медработника */
    public $positionCode;

    /** @var SlotPeriod Период */
    public $period;

    /**
     * Получить список слотов
     * @param GetSlotListByPeriodOptions $options
     */
    public function __construct(GetSlotListByPeriodOptions $options)
    {
        // TODO Добавить код
    }


}