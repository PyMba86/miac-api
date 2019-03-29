<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;
use Miac\Client\RequestOptions\GetActualSpecialistListOptions;

class ClientTest extends BaseTestCase
{
    public function testCanCreateClient()
    {
        $params = new Params([
            'sessionHandlerParams' => [
                'stateful' => true,
                'wsdl' => 'dummy wsdl'
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

    /**
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     * @throws \ReflectionException
     */
    public function testCanDoGetActualSpecialistList()
    {
        $mockSessionHandler = $this->getMockBuilder('Miac\Client\Session\Handler\HandlerInterface')->getMock();

        $mockedSendResult = new Client\Session\Handler\SendResult();
        $mockedSendResult->responseXml = 'dummyGetActualSpecialistListMessage';

        $messageResult = new Client\Result($mockedSendResult);

        $expectedMessageResult = new Client\Message\GetActualSpecialistList(
            new GetActualSpecialistListOptions([
                'muCode' => '2019'
            ])
        );

        $mockSessionHandler
            ->expects($this->once())
            ->method('sendMessage')
            ->with(
                'GetActualSpecialistList',
                $expectedMessageResult,
                ['endSession' => false, 'returnXml' => true]
            )
            ->will($this->returnValue($mockedSendResult));

        $mockSessionHandler
            ->expects($this->never())
            ->method('getLastResponse');

        $mockResponseHandler = $this->getMockBuilder('Miac\Client\ResponseHandler\ResponseHandlerInterface')->getMock();

        $mockResponseHandler
            ->expects($this->once())
            ->method('analyzeResponse')
            ->with($mockedSendResult, 'GetActualSpecialistList')
            ->will($this->returnValue($messageResult));


        $par = new Params();
        $par->sessionHandler = $mockSessionHandler;
        $par->requestCreatorParams = new Params\RequestCreatorParams([]);
        $par->responseHandler = $mockResponseHandler;
        $client = new Client($par);
        $response = $client->getActualSpecialistList(
            new Client\RequestOptions\GetActualSpecialistListOptions([
                'muCode' => '2019'
            ])
        );
        $this->assertEquals($messageResult, $response);

    }
}