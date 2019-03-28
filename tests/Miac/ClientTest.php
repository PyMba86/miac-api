<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;

class ClientTest extends BaseTestCase
{
    public function testCanCreateClient()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true
            ],
            'requestCreatorParams' => []
        ]);
        $client = new Client($params);
        $this->assertTrue($client->isStateful());
    }

    /**
     * @throws \ReflectionException
     */
    public function testCanClientWithOverrideHandlersAndCreator()
    {
        $params = new Params([
            'sessionHandler' => $this->getMockBuilder('Miac\Client\Session\Handler\HandlerInterface')->getMock(),
            'requestCreator' => $this->getMockBuilder('Miac\Client\RequestCreator\RequestCreatorInterface')->getMock(),
            'responseHandler' => $this->getMockBuilder('Miac\Client\ResponseHandler\ResponseHandlerInterface')->getMock()
        ]);

        $client = new Client($params);

        $this->assertInstanceOf('Miac\Client\Session\Handler\HandlerInterface', $params->sessionHandler);
        $this->assertInstanceOf('Miac\Client\RequestCreator\RequestCreatorInterface', $params->requestCreator);
        $this->assertInstanceOf('Miac\Client\ResponseHandler\ResponseHandlerInterface', $params->responseHandler);

        $this->assertInstanceOf('Miac\Client', $client);
    }
}