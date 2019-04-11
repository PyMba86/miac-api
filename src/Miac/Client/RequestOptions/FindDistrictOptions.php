<?php

namespace Miac\Client\RequestOptions;


class FindDistrictOptions extends Base
{
    /** @var string код КЛАДР населенного пункта */
    public $kladrCode;

    /** @var string улица (текст) */
    public $street;

    /** @var string номер дома */
    public $houseNumer;

    /** @var string глобальный уникальный идентификационный код адресообразующего элемента согласно ФИАС */
    public $addrobjFiasId;

    /** @var string глобальный уникальный идентификационный код объекта адресации согласно ФИАС */
    public $houseFiasId;
}