<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetRefBookPartial;
use Miac\Client\RequestOptions\GetRefBookPartialOptions;

class GetRefBookPartialConv extends BaseConverter
{

    /**
     * @param GetRefBookPartialOptions $requestOptions
     * @return GetRefBookPartial
     */
    public function convert($requestOptions)
    {
        return new GetRefBookPartial($requestOptions);
    }
}