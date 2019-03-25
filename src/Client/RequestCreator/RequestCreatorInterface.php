<?php

namespace Miac\Client\RequestCreator;

use Miac\Client\InvalidMessageException;
use Miac\Client\Message\InvalidArgumentException;
use Miac\Client\Params\RequestCreatorParams;
use Miac\Client\RequestOptions\RequestOptionsInterface;

/**
 * RequestCreatorInterface - интерфейс для создания запросов на различные сообщения на основе определенных входных
 * параметров.
 *
 * @package Miac\Client\RequestCreator
 */
interface RequestCreatorInterface
{
    /**
     * Создать обьект построителя запроса с параметрами
     * @param RequestCreatorParams $params
     */
    public function __construct(RequestCreatorParams $params);

    /**
     * Создать запрос для данного сообщения с заданным набором параметров для этого сообщения
     * @param string $messageName
     * @param RequestOptionsInterface $params
     * @throws InvalidArgumentException При предоставлении неверных параметров
     * @throws InvalidMessageException При попытке создать обращение, которого нет в wsdl
     * @return mixed
     */
    public function createRequest(string $messageName, RequestOptionsInterface $params);

}