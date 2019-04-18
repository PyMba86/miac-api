<?php

namespace Miac\Client\RequestOptions;


use DateTime;

class ChangeSlotStateOptions extends Base
{
    /** @var int Состояние слота - Свободен */
    const STATE_OPEN = 1;

    /** @var int Состояние слота - Занят */
    const STATE_BUSY = 2;


    /** @var int Статус записи - Активная */
    const STATUS_ACTIVE = 1;

    /** @var int  Статус записи - Выполнена(прием проведен) */
    const STATUS_DONE = 2;

    /** @var int  Статус записи - Отмена */
    const STATUS_CANCEL = 3;

    /** @var int Статус записи - Не выполнена (пациент не явился) */
    const STATUS_NO_PATIENT = 4;

    /** @var int Статус записи - Не выполнена (врач не смог провести прием) */
    const STATUS_NO_DOCTOR = 5;


    /** @var int Источник записи - МО */
    const SOURCE_MO = 1;

    /** @var int Источник записи - Федеральная регистратура (концентратор услуг ФЭР) */
    const SOURCE_FR = 5;

    /** @var int Источник записи - Мобильное приложение «Электронный кабинет пациента» */
    const SOURCE_MOBILE_EKP = 7;

    /** @var int Источник записи - Контакт-центр */
    const SOURCE_CONTACT_CENTER = 8;

    /** @var int Источник записи - Сайт МИС */
    const SOURCE_SITE_MIC = 9;

    /** @var int Источник записи - Терминал самозаписи МО */
    const SOURCE_TERMINAL_MO = 10;

    /** @var int Источник записи - Лист ожидания */
    const SOURCE_LIST_WAITING = 11;

    /** @var int Источник записи - Личный кабинет на Портале */
    const SOURCE_LK_PORTAL = 12;

    /** @var int Источник записи - Мобильное приложение «Госуслуги ХМАО» */
    const SOURCE_MOBILE_GOSXMAO = 12;


    /** @var int Пол - Мужской */
    const GENDER_MALE = 1;

    /** @var int Пол - Женский */
    const GENDER_FEMALE = 2;


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

    /**
     * @self GENDER_*
     * @var int пол
     */
    public $gender;

    /** @var string GUID слота */
    public $GUID;

    /**
     * @self STATE_*
     * @var int код состояния слота
     */
    public $SlotState;

    /**
     * @self STATUS_*
     * @var string int записи о приеме
     */
    public $status;

    /** @var string номер талона */
    public $slipNumber;

    /**
     * @self SOURCE_*
     * @var string источник записи
     */
    public $appointmentSource;

    /** @var string токен доступа */
    public $token;
}