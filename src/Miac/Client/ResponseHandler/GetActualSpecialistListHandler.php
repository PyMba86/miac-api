<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа GetActualSpecialistList
 * @package Miac\Client\ResponseHandler
 */
class GetActualSpecialistListHandler extends StandardResponseHandler
{

    /**
     * @inheritdoc
     */
    public function analyze(SendResult $response)
    {
        return $this->analyzeSimpleResponseErrorCodeAndMessage($response);
    }
}