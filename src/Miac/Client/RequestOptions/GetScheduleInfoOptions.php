<?php

namespace Miac\Client\RequestOptions;


use DateTime;

class GetScheduleInfoOptions extends Base
{
    /** @var DateTime дата */
    public $scheduleDate;

    /** @var string код МО в системе ТФОМС */
    public $muCode;

    /** @var string код отделения */
    public $deptCode;

    /** @var string номер кабинета */
    public $roomNumber;

    /** @var string код врача */
    public $docCode;

    /** @var string код специальности */
    public $specCode;

    /** @var string код позиции */
    public $positionCode;

    /** @var mixed */
    public $scheduleInfo;

    /** @var string ФИО доктора */
    public $docFIO;

    /** @var string CНИЛС доктора */
    public $docSNILS;

    /** @var string код медицинского действия */
    public $actionCode;

    /**
     * @var bool признак необходимости отправки ФИО врача и пациентов
     *          (если не указан, сведения не отправляются, если указан true – отправляются
     */
    public $needFIO;

}