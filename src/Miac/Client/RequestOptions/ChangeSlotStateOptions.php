<?php

namespace Miac\Client\RequestOptions;


use DateTime;

class ChangeSlotStateOptions extends Base
{
    /** @var string фамилия */
    public $Lastname;

    /** @var string имя */
    public $Firstname;

    /** @var string отчество (обязателен при наличии) */
    public $Middlename;

    /** @var DateTime дата рождения */
    public $birthDate;

    /** @var string полис ОМС */
    public $policyNumber;

    /** @var string полис ДМС */
    public $policyNumberDMS;

    /** @var string СНИЛС */
    public $SNILS;

    /** @var string серия паспорта */
    public $passportSeries;

    /** @var string номер паспорта */
    public $passportNumber;

    /** @var string  мобильный телефон */
    public $phone;

    /** @var string  адрес электронной почты*/
    public $email;

    /** @var string пол */
    public $gender;

    /** @var string GUID слота */
    public $GUID;

    /** @var string код состояния слота */
    public $SlotState;

    /** @var string статус записи о приеме */
    public $status;

    /** @var string номер кабинета */
    public $slipNumber;

    /** @var string код врача */
    public $appointmentSource;

    /** @var string код позиции */
    public $token;
}