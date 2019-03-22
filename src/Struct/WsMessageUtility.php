<?php

namespace Miac\Struct;

/**
 * WsMessageUtility - предоставляет служебные функции при построении сообщений веб-службы
 * @package Miac\Struct
 */
class WsMessageUtility
{
    /**
     * Проверяет все параметры на не пустоту
     * @return bool true если один из параметров не пустой
     */
    public function checkAnyNotEmpty()
    {
        $foundNotEmpty = false;
        $args = func_get_args();
        foreach ($args as $arg) {
            if (!empty($arg)) {
                $foundNotEmpty = true;
                break;
            }
        }
        return$foundNotEmpty;
    }

    /**
     * Check if all parameters to the current function are not empty
     *
     * @param mixed
     * @return boolean true if all parameters are not empty
     */
    protected function checkAllNotEmpty()
    {
        $foundEmpty = false;

        $args = func_get_args();

        foreach ($args as $arg) {
            if (empty($arg)) {
                $foundEmpty = true;
                break;
            }
        }

        return !$foundEmpty;
    }

    /**
     * Check if all parameters to the current function are integers
     *
     * @param mixed
     * @return boolean true if all parameters are integers
     */
    protected function checkAllIntegers()
    {
        $foundNonInt = false;

        $args = func_get_args();

        foreach ($args as $arg) {
            if (!is_int($arg)) {
                $foundNonInt = true;
                break;
            }
        }

        return !$foundNonInt;
    }

    /**
     * Check if any parameter to the current function is true
     *
     * @param mixed
     * @return boolean true if at least 1 parameter is true
     */
    protected function checkAnyTrue()
    {
        $foundTrue = false;

        $args = func_get_args();

        foreach ($args as $arg) {
            if ($arg === true) {
                $foundTrue = true;
                break;
            }
        }

        return $foundTrue;
    }

}