<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\GetAppointmentsBySNILS;
use Miac\Client\RequestOptions\GetAppointmentsBySNILSOptions;
class GetAppointmentsBySNILSConv extends BaseConverter
{

    /**
     * @param GetAppointmentsBySNILSOptions $requestOptions
     * @return string
     */
    public function convert($requestOptions)
    {
        return new GetAppointmentsBySNILS($requestOptions);
    }
}