<?php

namespace Miac\Client\RequestCreator\Converter;


use Miac\Client\Message\GetActualSpecialistList;
use Miac\Client\RequestOptions\GetActualSpecialistListOptions;

class GetActualSpecialistListConv extends BaseConverter
{

    /**
     * @param GetActualSpecialistListOptions $requestOptions
     * @return GetActualSpecialistList
     */
    public function convert($requestOptions)
    {
        return new GetActualSpecialistList($requestOptions);
    }
}