<?php

namespace Test\Miac\Client\Message;

use Miac\Client\Message\GetActualSpecialistList;
use Miac\Client\RequestOptions\GetActualSpecialistListOptions;
use Test\Miac\BaseTestCase;

class GetActualSpecialistListTest extends BaseTestCase
{

    public function testGetSpecialistsByMuCode()
    {
        $msg = new GetActualSpecialistList(
            new GetActualSpecialistListOptions([
                'muCode' => '2019'
            ])
        );

        $this->assertEquals('2019', $msg->muCode);
    }

}