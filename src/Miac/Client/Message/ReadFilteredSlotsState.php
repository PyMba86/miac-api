<?php

namespace Miac\Client\Message;

use DateTime;
use Miac\Client\RequestOptions\ReadFilteredSlotsStateOptions;

/**
 * Прочитать состояние слотов, удовлетворяющих фильтру
 * @package Miac\Client\Message
 */
class ReadFilteredSlotsState extends BaseWsMessage
{
    /**
     * @var DateTime
     */
    public $scheduleDate;

    /**
     * @var string
     */
    public $muCode;

    /**
     * @var string
     */
    public $deptCode;

    /**
     * @var string
     */
    public $roomNumber;

    /**
     * @var string
     */
    public $docCode;

    /**
     * @var string
     */
    public $specCode;

    /**
     * @var string
     */
    public $positionCode;

    /** @var mixed */
    public $scheduleInfo;

    /**
     * @var string
     */
    public $docFIO;

    /**
     * @var string
     */
    public $docSNILS;

    /**
     * @var string
     */
    public $actionCode;

    /**
     * @var bool
     */
    public $needFIO;

    /**
     * Получить данные о расписании
     * @param ReadFilteredSlotsStateOptions $options
     */
    public function __construct(ReadFilteredSlotsStateOptions $options)
    {
        $this->scheduleDate = $options->scheduleDate;
        $this->muCode = $options->muCode;
        $this->deptCode = $options->deptCode;
        $this->roomNumber = $options->roomNumber;
        $this->docCode = $options->docCode;
        $this->specCode = $options->specCode;
        $this->positionCode = $options->positionCode;
        $this->scheduleInfo = $options->scheduleInfo;
        $this->docFIO = $options->docFIO;
        $this->docSNILS = $options->docSNILS;
        $this->actionCode = $options->actionCode;
        $this->needFIO = $options->needFIO;
    }
}