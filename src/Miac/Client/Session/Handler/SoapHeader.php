<?php

namespace Miac\Miac\Client\Session\Handler;

use Miac\Client\Params\SessionHandlerParams;
use Miac\Client\Session\Handler\Base;

/**
 * Обработчик сессии с header заголовками
 * @package Miac\Miac\Client\Session\Handler
 */
class SoapHeader extends Base
{

    /**
     * @inheritdoc
     */
    protected function prepareForNextMessage($messageName, $messageOptions)
    {
        // TODO Установка soap заголовков
    }

    /**
     * @inheritdoc
     */
    protected function handlePostMessage($messageName, $lastResponse, $messageOptions, $result)
    {
        // TODO Чтение заголовков после отправки
    }

    /**
     * @inheritdoc
     */
    protected function makeSoapClientOptions()
    {
        $options = $this->soapClientOptions;
        $options['classmap'] = array_merge(Classmap::$soapheader, Classmap::$map);
        if (!empty($this->params->soapClientOptions)) {
            $options = array_merge($options, $this->params->soapClientOptions);
        }
        return $options;
    }


    /**
     * @inheritdoc
     */
    public function setStateful($stateful): void
    {
        if ($stateful === false) {
            throw new UnsupportedOperationException('Stateful messages are mandatory on SoapHeader 2');
        }
    }

    /**
     * @inheritdoc
     */
    public function isStateful()
    {
        return true;
    }
}