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
use Miac\NsiClient;
use Miac\PortalClient;

class NsiDummyClientTest extends BaseTestCase
{
    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanCreateClient()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'wsdl' => 'http://esb-test.miacugra.ru/NSIService/services/NsiServiceManagerImpl?wsdl',
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new NsiClient($params);

        $result = $client->getRefBookList(new Client\RequestOptions\GetRefBookListOptions([]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }


}