<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Params\RequestCreatorParams;

abstract class BaseConverter implements ConvertInterface {

    /**
     * @var RequestCreatorParams
     */
    protected $params;

    /**
     * @param RequestCreatorParams $params
     */
    public function setParams(RequestCreatorParams $params)
    {
        $this->params = $params;
    }
}