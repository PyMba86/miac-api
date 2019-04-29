<?php

namespace Miac\Client\RequestOptions;


class GetRefBookPartsOptions extends Base
{
    /** @var string справочника */
    public $code;

    /** @var string версия */
    public $version;
}