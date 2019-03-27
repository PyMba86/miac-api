<?php

namespace Miac\Client\Message;

/**
 * Получение списка специалистов МО
 * @package Miac\Client\Message
 */
class GetActualSpecialistList
{
    /** @var string код МО в системе ТФОМС */
    public $muCode;

    /**
     * Получить список специалистов МО
     * @param string $muCode
     */
    public function __construct(string $muCode)
    {
        $this->muCode = $muCode;
    }


}