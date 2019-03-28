<?php

namespace Miac\Client\Params;


use Miac\Client\LoadParamsFromArray;

/**
 * RequestCreatorParams содержит дополнительные параметры при создании обьекта запроса
 * @package Miac\Client\Params
 */
class RequestCreatorParams extends LoadParamsFromArray
{
    /**
     * The messages and versions that are provided in the WSDL
     *
     * @var array
     */
    public $messagesAndVersions = [];
}