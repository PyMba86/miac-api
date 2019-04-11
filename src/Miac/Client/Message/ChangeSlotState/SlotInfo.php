<?php

namespace Miac\Client\Message\ChangeSlotState;

class SlotInfo {

    /** @var string GUID слота */
    public $GUID;

    /** @var string код состояния слота */
    public $SlotState;

    /** @var PatientInfo параметры пациента */
    public $patientInfo;

    /**
     * SlotInfo constructor.
     * @param string $GUID
     * @param string $SlotState
     * @param PatientInfo $patientInfo
     */
    public function __construct(string $GUID, string $SlotState, PatientInfo $patientInfo)
    {
        $this->GUID = $GUID;
        $this->SlotState = $SlotState;
        $this->patientInfo = $patientInfo;
    }


}