<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;
use Miac\Client\RequestOptions\GetRefBookPartialOptions;
use Miac\Client\RequestOptions\GetRefBookPartsOptions;
use Miac\Client\RequestOptions\GetRefBookListOptions;
use Miac\Client\Result;
use Miac\NsiClient;

class NsiDummyClientTest extends BaseTestCase
{
    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetRefBookList()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new NsiClient($params);

        $result = $client->getRefBookList(new GetRefBookListOptions([]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }


    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetRefBookParts()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new NsiClient($params);

        $result = $client->getRefBookParts(new GetRefBookPartsOptions([
            'code' => 'HST0001',
            'version' => '1.0'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }



    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function testCanClientWithDummyGetRefBookPartial()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'dummy' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new NsiClient($params);

        $result = $client->getRefBookPartial(new GetRefBookPartialOptions([
            'code' => 'MDP365',
            'version' => '1.2',
            'part' => '1'
        ]));

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals(0, count($result->messages));
        $this->assertEquals(true, isset($result->response));
    }


}