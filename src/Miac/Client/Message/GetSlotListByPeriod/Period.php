<?php

namespace Miac\Client\Message\GetSlotByPeriod;


use DateTime;

class Period {

    /** @var DateTime начальная дата периода */
    public $beginDate;

    /** @var DateTime конечная дата периода */
    public $endDate;

    /**
     * Period constructor.
     * @param DateTime $beginDate
     * @param DateTime $endDate
     */
    public function __construct(DateTime $beginDate = null, DateTime $endDate = null)
    {
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
    }


}