<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа GetRefBookPartialHandler
 * @package Miac\Client\ResponseHandler
 */
class GetRefBookPartialHandler extends StandardResponseHandler
{

    /**
     * @inheritdoc
     */
    public function analyze(SendResult $response)
    {
        return $this->analyzeSimpleResponseMessage($response);
    }
}