<?php

namespace Miac\Client\Params;

use Miac\Client\SoapClient;

/**
 * SessionHandlerParams содержит все паматеры при установке обработчика сессии
 * @package Miac\Client\Params
 */
class SessionHandlerParams
{
    /**
     * wsdl файлы и пути, который будет использоваться при запросах
     * @var string[]
     */
    public $wsdl = [];

    /**
     * Сохранение сообщений при отправке
     * @var bool
     */
    public $stateful = true;

    /**
     *  override Параметры для SoapClient
     * @var array
     */
    public $soapClientOptions = [];

    /**
     * override Soap клиент
     * @var SoapClient
     */
    public $overrideSoapClient;

    /**
     * override SoapClient WSDL name
     * @var string
     */
    public $overrideSoapClientWsdlName;

    /**
     * @param array $params
     */
    public function __construct($params = [])
    {
        $this->loadFromArray($params);
    }

    /**
     * Загрузка параметров из ассоциативного массива
     * @param array $params
     */
    protected function loadFromArray(array $params)
    {
        $this->loadWsdl($params);
        $this->loadStateful($params);
        $this->loadOverrideSoapClient($params);
        $this->loadSoapClientOptions($params);
    }

    /**
     * Загрузка wsdl
     * Ожидается wsdl путь или массив wsdl путей
     * @param array $params
     */
    protected function loadWsdl(array $params)
    {
        if (isset($params['wsdl'])) {
            if (is_string($params['wsdl'])) {
                $this->wsdl = [
                    $params['wsdl']
                ];
            } elseif (is_array($params['wsdl'])) {
                $this->wsdl = $params['wsdl'];
            }
        }
    }

    /**
     * Load Stateful param from config
     *
     * @param array $params
     * @return void
     */
    protected function loadStateful($params)
    {
        $this->stateful = (isset($params['stateful'])) ? $params['stateful'] : true;
    }

    /**
     * Load Override SoapClient parameter from config
     *
     * @param array $params
     * @return void
     */
    protected function loadOverrideSoapClient($params)
    {
        if (isset($params['overrideSoapClient']) && $params['overrideSoapClient'] instanceof \SoapClient) {
            $this->overrideSoapClient = $params['overrideSoapClient'];
        }
        if (isset($params['overrideSoapClientWsdlName'])) {
            $this->overrideSoapClientWsdlName = $params['overrideSoapClientWsdlName'];
        }
    }

    /**
     * Load SoapClient Options from config
     *
     * @param array $params
     * @return void
     */
    protected function loadSoapClientOptions($params)
    {
        if (isset($params['soapClientOptions']) && is_array($params['soapClientOptions'])) {
            $this->soapClientOptions = $params['soapClientOptions'];
        }
    }

}