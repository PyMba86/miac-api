<?php

namespace Miac\Client\Result;


class NotOk
{
    /** @var string Код ответа */
    public $code;

    /** @var string Сообщение */
    public $text;

    /** @var string Уровень сообщения */
    public $level;

    /**
     * NotOk constructor.
     * @param string $code
     * @param string $text
     * @param string $level
     */
    public function __construct(string $code, string $text, string $level)
    {
        $this->code = $code;
        $this->text = $text;
        $this->level = $level;
    }
}