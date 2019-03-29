<?php

namespace Miac\Client\Session\Handler;

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
     * @throws \Exception
     */
    public function setStateful($stateful): void
    {
        if ($stateful === false) {
            throw new \Exception('Stateful messages are mandatory on SoapHeader');
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