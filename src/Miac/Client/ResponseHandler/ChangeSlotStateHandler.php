<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа ChangeSlotStateHandler
 * @package Miac\Client\ResponseHandler
 */
class ChangeSlotStateHandler extends StandardResponseHandler
{

    /**
     * @inheritdoc
     */
    public function analyze(SendResult $response)
    {
        return $this->analyzeSimpleResponseErrorCodeAndMessage($response);
    }
}