<?php

namespace Miac\Client\RequestCreator;


use Miac\Client\Params\RequestCreatorParams;

class Factory
{
    /**
     * Create a Request Creator
     *
     * @param RequestCreatorParams $params
     * @return RequestCreatorInterface
     * @throws \InvalidArgumentException when the parameters to create the handler do not make sense.
     */
    public static function createRequestCreator($params)
    {
        $theRequestCreator = new Base($params);
        return $theRequestCreator;
    }

}