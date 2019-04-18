<?php

namespace Miac\Client\Message\ChangeSlotState;

use DateTime;

class PatientInfo {

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

    /** @var int пол */
    public $gender;

}