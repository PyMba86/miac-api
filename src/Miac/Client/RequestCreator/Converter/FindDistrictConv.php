<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\FindDistrict;
use Miac\Client\RequestOptions\FindDistrictOptions;

class FindDistrictConv extends BaseConverter
{

    /**
     * @param FindDistrictOptions $requestOptions
     * @return FindDistrict
     */
    public function convert($requestOptions)
    {
        return new FindDistrict($requestOptions);
    }
}