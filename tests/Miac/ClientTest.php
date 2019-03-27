<?php

namespace Test\Miac;

use Miac\Client;
use Miac\Client\Params;

class ClientTest extends BaseTestCase
{
    public function testCanCreateClient()
    {
        $par = new Params([
            'sessionHandlerParams' => [
                'stateful' => true
            ]
        ]);
        $client = new Client($par);
        $this->assertTrue($client->isStateful());
    }
}