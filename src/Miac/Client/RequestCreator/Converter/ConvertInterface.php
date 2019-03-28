<?php

namespace Miac\Client\RequestCreator\Converter;

use Miac\Client\Message\BaseWsMessage;
use Miac\Client\Params\RequestCreatorParams;
use Miac\Client\RequestOptions\RequestOptionsInterface;

/**
 * Интерфейс используется когда идет сравнение сообщения с параметрами запроса.
 *
 * Привидение сообщения в актуальную структуру
 *
 * @package Miac\Miac\Client\RequestCreator\Converter
 */
interface ConvertInterface
{
    /**
     * Convert request options into a WS Request structure
     *
     * @param RequestOptionsInterface $requestOptions The request options to build the message
     * @param string|int $version The message version in the WSDL
     * @return BaseWsMessage Message request structure to be sent to the SOAP Server
     */
    public function convert($requestOptions, $version);
    /**
     * Load Request Creator params
     *
     * @param RequestCreatorParams $params
     * @return void
     */
    public function setParams(RequestCreatorParams $params);
}