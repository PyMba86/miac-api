<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetSlotListByPeriod;
use Miac\Client\RequestOptions\GetSlotListByPeriodOptions;

class GetSlotListByPeriodConv extends BaseConverter
{

    /**
     * @param GetSlotListByPeriodOptions $requestOptions
     * @return GetSlotListByPeriod
     */
    public function convert($requestOptions)
    {
        return new GetSlotListByPeriod($requestOptions);
    }
}