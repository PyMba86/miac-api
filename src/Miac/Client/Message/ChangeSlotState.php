<?php

namespace Miac\Client\Message;

use Miac\Client\Message\ChangeSlotState\PatientInfo;
use Miac\Client\Message\ChangeSlotState\SlotInfo;
use Miac\Client\RequestOptions\ChangeSlotStateOptions;

/**
 * Изменить состояние слота
 * @package Miac\Client\Message
 */
class ChangeSlotState extends BaseWsMessage
{
    /** @var SlotInfo слот */
    public $slotInfo;

    /** @var string статус записи о приеме */
    public $status;

    /** @var string номер кабинета */
    public $slipNumber;

    /** @var string код врача */
    public $appointmentSource;

    /** @var string код позиции */
    public $token;

    /**
     * Получить данные о расписании
     * @param ChangeSlotStateOptions $options
     */
    public function __construct(ChangeSlotStateOptions $options)
    {
        $patientInfo = new PatientInfo();
        $patientInfo->Lastname = $options->Lastname;
        $patientInfo->Firstname = $options->Firstname;
        $patientInfo->Middlename = $options->Middlename;
        $patientInfo->birthDate = $options->birthDate;
        $patientInfo->policyNumber = $options->policyNumber;
        $patientInfo->policyNumberDMS = $options->policyNumberDMS;
        $patientInfo->SNILS = $options->SNILS;
        $patientInfo->passportSeries = $options->passportSeries;
        $patientInfo->passportNumber = $options->passportNumber;
        $patientInfo->phone = $options->phone;
        $patientInfo->email = $options->email;
        $patientInfo->gender = $options->gender;

        $this->slotInfo = new SlotInfo($options->GUID, $options->SlotState, $patientInfo);
        $this->status = $options->status;
        $this->slipNumber = $options->slipNumber;
        $this->appointmentSource = $options->appointmentSource;
        $this->token = $options->token;
    }
}