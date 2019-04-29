<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;
use Miac\Client\Result;
use Miac\NsiClient;

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