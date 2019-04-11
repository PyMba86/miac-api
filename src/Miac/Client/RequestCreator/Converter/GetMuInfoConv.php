<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetMuInfo;
use Miac\Client\RequestOptions\GetMuInfoOptions;

class GetMuInfoConv extends BaseConverter
{

    /**
     * @param GetMuInfoOptions $requestOptions
     * @return GetMuInfo
     */
    public function convert($requestOptions)
    {
        return new GetMuInfo($requestOptions);
    }
}