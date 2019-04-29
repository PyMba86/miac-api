<?php

namespace Miac\Client\Session\Transform;

use SimpleXMLElement;

/**
 * Удалить атрибуты у тегов
 * @package Miac\Client\Session\Transform
 */
class XmlAttributeTransform implements TransformInterface
{

    /**
     * @inheritdoc
     */
    public function transform(string $response): string
    {
        return preg_replace("/(<[\w]+)([^>]*?)([\/?]?>)/m", "$1$3", $response);
    }

}