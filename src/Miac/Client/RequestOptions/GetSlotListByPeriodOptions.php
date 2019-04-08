<?php

namespace Miac\Client\RequestOptions;


use DateTime;

class GetSlotListByPeriodOptions extends Base
{
    /** @var string код МО в системе ТФОМС */
    public $muCode;

    /** @var string код отделения */
    public $deptCode;

    /** @var string номер кабинета */
    public $snils;

    /** @var string код врача */
    public $profCode;

    /** @var string код позиции */
    public $positionCode;

    /** @var DateTime начальная дата периода */
    public $beginDate;

    /** @var DateTime конечная дата периода */
    public $endDate;

}