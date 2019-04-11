<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;
use Miac\Client\RequestOptions\GetActualSpecialistListOptions;
use Miac\Client\Result;

class RemoteClientTest extends BaseTestCase {

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanCreateClient()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'wsdl' => "http://10.86.11.80/PortalService/services/portal?wsdl",
            ],
            'requestCreatorParams' => []
        ]);
        $client = new Client($params);

        $result = $client->getActualSpecialistList(new GetActualSpecialistListOptions([
            'muCode' => '2019'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
    }
}