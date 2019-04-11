<?php

namespace Miac;

use Miac\Client\Base;
use Miac\Client\Params;
use Miac\Client\RequestOptions;
use Miac\Client\RequestOptions\RequestOptionsInterface;

/**
 * Клиент
 * @package PyMba86\Miac
 */
class Client extends Base
{
    /** @var string */
    protected $lastMessage;

    /**
     * Конструктор клиента МИАЦ
     * @param Params $params
     */
    public function __construct(Params $params)
    {
        $this->loadClientParams($params);
    }

    /**
     * Вызов сообщения с параметрами
     *
     * @param string $messageName
     * @param RequestOptionsInterface $options
     * @param $messageOptions
     * @param bool $endSession
     * @return Client\Result
     * @throws Client\InvalidMessageException
     * @throws Client\Exception
     */
    protected function callMessage(string $messageName, RequestOptionsInterface $options,
                                   $messageOptions, bool $endSession = false)
    {

        $messageOptions = $this->makeMessageOptions($messageOptions, $endSession);

        $this->lastMessage = $messageName;

        $sendResult = $this->sessionHandler->sendMessage(
            $messageName,
            $this->requestCreator->createRequest($messageName, $options),
            $messageOptions);

        $response = $this->responseHandler->analyzeResponse($sendResult, $messageName);

        if ($messageOptions['returnXml'] === false) {
            $response->responseXml = null;
        }

        return $response;
    }


    protected function makeMessageOptions(array $incoming, $endSession = false)
    {
        $options = [
            'endSession' => $endSession,
            'returnXml' => $this->returnResultXml
        ];
        if (array_key_exists('endSession', $incoming)) {
            $options['endSession'] = $incoming['endSession'];
        }
        if (array_key_exists('returnXml', $incoming)) {
            $options['returnXml'] = $incoming['returnXml'];
        }
        return $options;
    }

    /**
     * Set the session as stateful (true) or stateless (false)
     *
     * @param bool $newStateful
     */
    public function setStateful($newStateful)
    {
        $this->sessionHandler->setStateful($newStateful);
    }

    /**
     * @return bool
     */
    public function isStateful()
    {
        return $this->sessionHandler->isStateful();
    }


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
}