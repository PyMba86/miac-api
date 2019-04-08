<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetScheduleInfo;
use Miac\Client\RequestOptions\GetScheduleInfoOptions;

class GetScheduleInfoConv extends BaseConverter
{

    /**
     * @param GetScheduleInfoOptions $requestOptions
     * @return GetScheduleInfo
     */
    public function convert($requestOptions)
    {
        return new GetScheduleInfo($requestOptions);
    }
}