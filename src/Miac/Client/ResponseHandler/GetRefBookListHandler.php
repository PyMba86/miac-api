<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа getRefBookListHandler
 * @package Miac\Client\ResponseHandler
 */
class getRefBookListHandler extends StandardResponseHandler
{

    /**
     * @inheritdoc
     */
    public function analyze(SendResult $response)
    {
        return $this->analyzeSimpleResponseMessage($response);
    }
}