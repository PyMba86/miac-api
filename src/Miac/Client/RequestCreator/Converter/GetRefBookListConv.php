<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetRefBookList;
use Miac\Client\RequestOptions\GetRefBookListOptions;

class GetRefBookListConv extends BaseConverter
{

    /**
     * @param GetRefBookListOptions $requestOptions
     * @return GetRefBookList
     */
    public function convert($requestOptions)
    {
        return new GetRefBookList($requestOptions);
    }
}