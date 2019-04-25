<?php

namespace Miac\Client\Session\Transform;

use SimpleXMLElement;

/**
 * Удалить пространство имен из ответа
 * @package Miac\Client\Session\Transform
 */
class XmlNameTransform implements TransformInterface {

    /**
     * @inheritdoc
     */
    public function transform(string $response): string
    {
        $xml = preg_replace("/(<\/?)(\w+)*([^>]*>)/", "$1$2$3", $response);
        return preg_replace("/([a-zA-Z]+)([0-9]+):([^>]*)/m", "$3", $xml);
    }

}