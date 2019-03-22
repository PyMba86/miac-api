<?php

namespace Miac\Mapper\Field;

/**
 * Интерфейс для поля сущности
 * @package Miac\Mapper\Field
 */
interface FieldInterface
{
    /**
     * Конвертирует входящий параметр к типу, соответствующему данному полю
     *
     * @param string $input
     * @return mixed
     */
    public function convertToData(string $input);

    /**
     * Конвертирует входящий параметр к строке
     * @param $input
     * @return string
     */
    public function convertToString($input): string;
}