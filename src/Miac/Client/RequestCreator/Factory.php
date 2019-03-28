<?php

namespace Miac\Miac\Client\RequestCreator;


use Miac\Client\Params\RequestCreatorParams;
use Miac\Client\RequestCreator\RequestCreatorInterface;

class Factory
{
    /**
     * Create a Request Creator
     *
     * @param RequestCreatorParams $params
     * @param string $libIdentifier
     * @return RequestCreatorInterface
     * @throws \InvalidArgumentException when the parameters to create the handler do not make sense.
     */
    public static function createRequestCreator($params, $libIdentifier)
    {
        $theRequestCreator = new Base($params);
        return $theRequestCreator;
    }

}