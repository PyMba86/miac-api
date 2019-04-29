<?php

namespace Miac\Client\Session\Transform;

use SimpleXMLElement;

/**
 * Интерфейс преобразования soap ответа от сервера
 * @package Miac\Client\Session\Transform
 */
interface TransformInterface {

    /**
     * Преобразование ответа от сервера
     * @param string $response
     * @return SimpleXMLElement
     */
    public function transform(string $response): string;
}