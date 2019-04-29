<?php

namespace Miac\Client\RequestOptions;


class GetRefBookPartialOptions extends Base
{
    /** @var string справочника */
    public $code;

    /** @var string версия */
    public $version;

    /** @var string часть справочника */
    public $part;

}