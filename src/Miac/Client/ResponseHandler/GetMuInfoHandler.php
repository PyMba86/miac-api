<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа GetMuInfo
 * @package Miac\Client\ResponseHandler
 */
class GetMuInfoHandler extends StandardResponseHandler
{

    /**
     * @inheritdoc
     */
    public function analyze(SendResult $response)
    {
        return $this->analyzeSimpleResponseErrorCodeAndMessage($response);
    }
}