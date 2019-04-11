<?php

namespace Test\Miac\Client\Message;

use Miac\Client\Message\FindDistrict;
use Miac\Client\RequestOptions\FindDistrictOptions;
use Test\Miac\BaseTestCase;

class FindDistrictTest extends BaseTestCase
{

    public function testFindDistrict()
    {
        $msg = new FindDistrict(
            new FindDistrictOptions([
                'kladrCode' => '123',
                'street' => '123',
                'houseNumer' => '123',
                'addrobjFiasId' => '123',
                'houseFiasId' => '123',
            ])
        );

        $this->assertEquals('123', $msg->kladrCode);
        $this->assertEquals('123', $msg->street);
        $this->assertEquals('123', $msg->houseNumer);
        $this->assertEquals('123', $msg->addrobjFiasId);
        $this->assertEquals('123', $msg->houseFiasId);
    }

}