<?php

namespace Test\Miac\Client;

use Miac\Client\Result;
use Miac\Client\Session\Handler\SendResult;
use stdClass;
use Test\Miac\BaseTestCase;

class ResultTest extends BaseTestCase
{

    public function testCantConstruct()
    {
        $responseObject = new stdClass();
        $responseObject->dummyProp = new stdClass();

        $dummySendResult = new SendResult();
        $dummySendResult->responseObject = $responseObject;
        $dummySendResult->responseXml = 'dummy XML message';

        $result = new Result($dummySendResult);

        $this->assertEquals(Result::STATUS_OK, $result->status);
        $this->assertEquals('dummy XML message', $result->responseXml);
        $this->assertEquals($responseObject, $result->response);
    }
}