<?php

namespace Test\Miac\Client\ResponseHandler;

use Miac\Client\ResponseHandler;
use Miac\Client\Result;
use Miac\Client\Session\Handler\SendResult;
use Test\Miac\BaseTestCase;

class BaseTest extends BaseTestCase
{
    /**
     * @throws \ReflectionException
     * @throws \Miac\Client\Exception
     */
    public function testCanHandleGetSpecialistsErrorMessageNotFound() {

        $responseHandler = new ResponseHandler\Base();

        $sendResult = new SendResult();
        $sendResult->responseXml = $this->getTestFile('dummyGetActualSpecialistListErrorNotFoundResponse.xml');

        $result = $responseHandler->analyzeResponse($sendResult,
            'GetActualSpecialistList');

        $this->assertEquals(Result::STATUS_ERROR, $result->status);
        $this->assertEquals(1, count($result->messages));
        $this->assertEquals('-1', $result->messages[0]->code);
        $this->assertEquals('Портальный сервис : Медицинская организация с кодом "2019" не найдена', $result->messages[0]->text);
    }
}