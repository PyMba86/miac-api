<?php

namespace Miac\Client\ResponseHandler;

use Miac\Client\Session\Handler\SendResult;

/**
 * Обработчик ответа GetAppointmentsBySNILS
 * @package Miac\Client\ResponseHandler
 */
class GetAppointmentsBySNILSHandler extends StandardResponseHandler
{

    /**
     * @inheritdoc
     */
    public function analyze(SendResult $response)
    {
        return $this->analyzeSimpleResponseErrorCodeAndMessage($response);
    }
}