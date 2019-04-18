<?php

namespace Miac\Client\Message\ChangeSlotState;

/**
 * Тип слота
 * @package Miac\Client\Message\ChangeSlotState
 */
class SlotType
{
    /** @var int Врач принимает по записи */
    const PLANNED = 2;

    /** @var int Плановый прием по записи детей до 16 лет */
    const PLAN_UP_16 = 7;

    /** @var int Врач принимает по записи, детей после 16 лет и взрослых */
    const PLAN_OVER_16 = 8;

    /** @var int Слот предназначен для записи на приём для прохождения диспансеризации */
    const CLINICAL_EXAMINATION = 14;

    /** @var int Слот предназначен для записи на приём для прохождения профилактических медицинских осмотров */
    const PROF_INSPECTION = 15;
}