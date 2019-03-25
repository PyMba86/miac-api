<?php

namespace Miac;

use SoapClient;

/**
 * Клиент
 * @package PyMba86\Miac
 */
class Client extends SoapClient
{
    /** @var string */
    protected $wsdl;


    public function __construct(string $wsdl, array $options, array $headers = [])
    {
        parent::__construct($wsdl, $options);

        if (!empty($headers)) {
            $this->headers($headers);
        }
    }

    public function getTypes()
    {
        return $this->__getTypes();
    }

    /**
     * Установить новое куки значение
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function cookie(string $name, string $value)
    {
        $this->__setCookie($name, $value);
        return $this;
    }

    /**
     * @param string $location
     * @return $this
     */
    public function location(string $location = '')
    {
        $this->__setLocation($location);
        return $this;
    }

    /**
     * Установить заголовки клиента
     * @param array $headers
     * @return $this
     */
    protected function headers(array $headers = [])
    {
        $this->__setSoapHeaders($headers);
        return $this;
    }

}