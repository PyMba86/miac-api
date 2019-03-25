<?php

namespace Miac\Client;

/**
 * Обеспечивает возможность загрузки параметров в конструктор через ассоциативный массив
 *
 * Ключи в ассоциативном массиве должны быть именами свойств, и если они совпадают, значения будут установлены
 * к этим свойствам.
 *
 * @package Miac\Client
 */
class LoadParamsFromArray
{

    /**
     * Построить обьект параметров запроса с помощью ассоциативного массива
     * @param array $params Параметры инциализации
     */
    public function __construct($params = [])
    {
        foreach ($params as $propName => $propValue) {
            if (property_exists($this, $propName)) {
                $this->$propName = $propValue;
            }
        }
        //TODO Должна еще быть поддержка построения с помощью обьектов
    }
}