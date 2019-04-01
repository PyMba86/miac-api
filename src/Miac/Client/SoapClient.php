<?php

namespace Miac\Client;

/**
 * Это XSLT-преобразование удалит пустые узлы из исходящего запроса.
 * С другой стороны, в некоторых контекстах НЕОБХОДИМЫ пустые узлы.
 * Это XSLT-преобразование по умолчанию удаляет все пустые узлы, кроме тех, которые упомянуты в первой строке.
 * @package Miac\Client
 */
class SoapClient extends \SoapClient
{
    const REMOVE_EMPTY_XSLT_LOCATION = 'SoapClient/removeempty.xslt';

    /**
     * __doRequest SoapClient
     * @param string $request XML SOAP запрос
     * @param string $location Url для запроса
     * @param string $action SOAP действие
     * @param int $version SOAP версия
     * @param int $one_way
     * @return string|void XML SOAP ответ
     * @throws Exception Когда PHP XSL расширение не установлено или wsdl файл не найден
     */
    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        // FIXME Убрал преобразование данных xsl
       /* if (!extension_loaded('xsl')) {
            throw new Exception("PHP XSL extension is not loaded");
        }
        $newRequest = $this->transformIncomingRequest($request); */
        parent::__doRequest($request, $location, $action, $version, $one_way);
    }

    /**
     * Трансформировние запроса
     * @param string $request
     * @return string|null
     * @throws Exception
     */
    protected function transformIncomingRequest(string $request)
    {
        $newRequest = null;

        $xsltFile = dirname(__FILE__).DIRECTORY_SEPARATOR.self::REMOVE_EMPTY_XSLT_LOCATION;

        if (!is_readable($xsltFile)) {
            throw  new Exception('XSLT file "'.$xsltFile.'" is not readable!');
        }

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->loadXML($request);
        $xslt = new \DOMDocument('1.0', 'UTF-8');

        $xslt->load($xsltFile);

        $processor = new \XSLTProcessor();
        $processor->importStylesheet($xslt);
        $transform = $processor->transformToXml($dom);

        if ($transform === false) {
            $newRequest = $request;
        } else {
            $newDom = new \DOMDocument('1.0', 'UTF-8');
            $newDom->preserveWhiteSpace = false;
            $newDom->loadXML($transform);

            $newRequest = $newDom->saveXML();
        }

        unset($processor, $xslt, $dom, $transform);

        return $newRequest;
    }
}