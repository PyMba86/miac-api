<?php

namespace Miac\Mapper\Field;

/**
 * Целочисленный ти поля
 * @package Miac\Mapper\Field
 */
class IntNumber implements FieldInterface
{

    /**
     * Конвертирует входящий параметр к типу, соответствующему данному полю
     *
     * @param string $input
     * @return mixed
     */
    public function convertToData(string $input)
    {
        // TODO: Implement convertToData() method.
    }

    /**
     * Конвертирует входящий параметр к строке
     * @param $input
     * @return string
     */
    public function convertToString($input): string
    {
        // TODO: Implement convertToString() method.
    }
}