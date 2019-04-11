<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\ChangeSlotState;
use Miac\Client\RequestOptions\ChangeSlotStateOptions;

class ChangeSlotStateConv extends BaseConverter
{

    /**
     * @param ChangeSlotStateOptions $requestOptions
     * @return ChangeSlotState
     */
    public function convert($requestOptions)
    {
        return new ChangeSlotState($requestOptions);
    }
}