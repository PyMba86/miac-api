<?php

namespace Miac;

use Miac\Client\RequestOptions;

class PortalClient extends Client {

    /**
     * GetActualSpecialList
     *
     * @param RequestOptions\GetActualSpecialistListOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getActualSpecialistList(
        RequestOptions\GetActualSpecialistListOptions $options,
        $messageOptions = [])
    {
        $msgName = "getActualSpecialistList";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * FindDistrict
     *
     * @param RequestOptions\FindDistrictOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function findDistrict(
        RequestOptions\FindDistrictOptions $options,
        $messageOptions = [])
    {
        $msgName = "findDistrict";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * GetMuInfo
     *
     * @param RequestOptions\GetMuInfoOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getMuInfo(
        RequestOptions\GetMuInfoOptions $options,
        $messageOptions = [])
    {
        $msgName = "getMuInfo";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * ChangeSlotState
     *
     * @param RequestOptions\ChangeSlotStateOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function changeSlotState(
        RequestOptions\ChangeSlotStateOptions $options,
        $messageOptions = [])
    {
        $msgName = "changeSlotState";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * GetScheduleInfo
     *
     * @param RequestOptions\GetScheduleInfoOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getScheduleInfo(
        RequestOptions\GetScheduleInfoOptions $options,
        $messageOptions = [])
    {
        $msgName = "getScheduleInfo";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * GetSlotListByPeriod
     *
     * @param RequestOptions\GetSlotListByPeriodOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getSlotListByPeriod(
        RequestOptions\GetSlotListByPeriodOptions $options,
        $messageOptions = [])
    {
        $msgName = "getSlotListByPeriod";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * ReadFilteredSlotState
     *
     * @param RequestOptions\ReadFilteredSlotsStateOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function readFilteredSlotState(
        RequestOptions\ReadFilteredSlotsStateOptions $options,
        $messageOptions = [])
    {
        $msgName = "readFilteredSlotsState";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * GetAppointmentsBySNILS
     *
     * @param RequestOptions\GetAppointmentsBySNILSOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getAppointmentsBySNILS(
        RequestOptions\GetAppointmentsBySNILSOptions $options,
        $messageOptions = [])
    {
        $msgName = "getAppointmentsBySNILS";
        return $this->callMessage($msgName, $options, $messageOptions);
    }
}