<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;
use Miac\Client\RequestOptions\ChangeSlotStateOptions;
use Miac\Client\RequestOptions\FindDistrictOptions;
use Miac\Client\RequestOptions\GetActualSpecialistListOptions;
use Miac\Client\RequestOptions\GetAppointmentsBySNILSOptions;
use Miac\Client\RequestOptions\GetMuInfoOptions;
use Miac\Client\RequestOptions\GetScheduleInfoOptions;
use Miac\Client\RequestOptions\GetSlotListByPeriodOptions;
use Miac\Client\RequestOptions\ReadFilteredSlotsStateOptions;
use Miac\Client\Result;
use Miac\PortalClient;

class PortalDummyClientTest extends BaseTestCase
{
    public function testCanCreateClient()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);
        $this->assertTrue($client->isStateful());
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetSpecialistsList()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->getActualSpecialistList(new GetActualSpecialistListOptions([
            'muCode' => '19123'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyFindDistrict()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'wsdl' => "http://5.141.28.40:44555/PortalService/services/portal?wsdl",
                'stateful' => true,
                'soapClientOptions' => [
                    'proxy_host' => "5.141.28.40",
                    'proxy_port' => "44555"
                ]
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->findDistrict(new FindDistrictOptions([
            'kladrCode' => '8600000100000',
            'street' => 'Дунина-Горкавича',
            'houseNumer' => '15'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetMuInfo()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->getMuInfo(new GetMuInfoOptions([
            'muCode' => '19123'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyChangeSlotState()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->changeSlotState(new ChangeSlotStateOptions([
            'Lastname' => '19123',
            'Firstname' => '19123',
            'Middlename' => '16067057157',
            'birthDate' => '2015-01-01',
            'policyNumber' => '74',
            'SNILS' => '12312312412',
            'passportNumber' => '123321',
            'passportSeries' => '1232',
            'phone' => '213125123123',
            'email' => '213125123123',
            'gender' => ChangeSlotStateOptions::GENDER_MALE,
            'GUID' => '1',
            'SlotState' => ChangeSlotStateOptions::STATE_OPEN,
            'status' => ChangeSlotStateOptions::STATUS_ACTIVE,
            'slipNumber' => '1',
            'appointmentSource' => 5,
            'token' => '1',
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(1, count($result->messages));
        $this->assertEquals(true, isset($result->response));
        $this->assertEquals('0', $result->messages[0]->code);
        $this->assertEquals('', $result->messages[0]->text);
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetSlotListByPeriod()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->getSlotListByPeriod(new GetSlotListByPeriodOptions([
            'muCode' => '19123',
            'depCode' => '191231528',
            'snils' => '15188021051',
            'profCode' => '15188021051',
            'positionCode' => '91',
            'beginDate' => '2019-04-16',
            'endDate' => '2019-04-21'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyReadFilteredSlotsState()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->readFilteredSlotState(new ReadFilteredSlotsStateOptions([
            'scheduleDate' => '2019-04-17',
            'muCode' => '19123',
            'deptCode' => '191231528',
            'positionCode' => '91',
            'docSNILS' => '15188021051',
            'needFIO' => true

        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetScheduleInfo()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->getScheduleInfo(new GetScheduleInfoOptions([
            'scheduleDate' => '2019-04-17',
            'muCode' => '19123',
            'positionCode' => '91',
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetAppointmentsBySNILS()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new PortalClient($params);

        $result = $client->getAppointmentsBySNILS(new GetAppointmentsBySNILSOptions([
            'snils' => '12956840697'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }

}