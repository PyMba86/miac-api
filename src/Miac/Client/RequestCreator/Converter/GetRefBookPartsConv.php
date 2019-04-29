<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetRefBookParts;
use Miac\Client\RequestOptions\GetRefBookPartsOptions;

class GetRefBookPartsConv extends BaseConverter
{

    /**
     * @param GetRefBookPartsOptions $requestOptions
     * @return GetRefBookParts
     */
    public function convert($requestOptions)
    {
        return new GetRefBookParts($requestOptions);
    }
}