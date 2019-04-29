<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetRefBookList;
use Miac\Client\RequestOptions\GetRefBookPartsOptions;

class GetRefBookPartsConv extends BaseConverter
{

    /**
     * @param GetRefBookPartsOptions $requestOptions
     * @return GetRefBookList
     */
    public function convert($requestOptions)
    {
        return new GetRefBookList($requestOptions);
    }
}