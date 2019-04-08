<?php

namespace Miac\Client\RequestCreator\Converter;


use Miac\Client\Message\ReadFilteredSlotsState;
use Miac\Client\RequestOptions\ReadFilteredSlotsStateOptions;

class ReadFilteredSlotsStateConv extends BaseConverter
{

    /**
     * @param ReadFilteredSlotsStateOptions $requestOptions
     * @return ReadFilteredSlotsState
     */
    public function convert($requestOptions)
    {
        return new ReadFilteredSlotsState($requestOptions);
    }
}