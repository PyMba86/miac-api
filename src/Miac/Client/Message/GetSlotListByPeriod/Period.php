<?php

namespace Miac\Client\Message\GetSlotListByPeriod;


class Period {

    /** @var string начальная дата периода */
    public $beginDate;

    /** @var string конечная дата периода */
    public $endDate;

    /**
     * Period constructor.
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $beginDate = null, string $endDate = null)
    {
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
    }


}