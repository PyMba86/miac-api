<?php

namespace Miac\Client\Message;

use Miac\Client\RequestOptions\FindDistrictOptions;

/**
 * Поиск участка
 * @package Miac\Client\Message
 */
class FindDistrict extends BaseWsMessage
{
    /**
     * @var string
     */
    public $kladrCode;

    /**
     * @var string
     */
    public $street;

    /**
     * @var string
     */
    public $houseNumer;

    /**
     * @var string
     */
    public $addrobjFiasId;

    /**
     * @var string
     */
    public $houseFiasId;

    /**
     * Поиск участка
     * @param FindDistrictOptions $options
     */
    public function __construct(FindDistrictOptions $options)
    {
        $this->kladrCode = $options->kladrCode;
        $this->street = $options->street;
        $this->houseNumer = $options->houseNumer;

        $this->addrobjFiasId = $options->addrobjFiasId;
        $this->houseFiasId = $options->houseFiasId;
    }
}