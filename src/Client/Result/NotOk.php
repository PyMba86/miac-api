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
    public function __construct(string $code = null, string $text = null, string $level = null)
    {
        $this->code = $code;
        $this->text = $text;
        $this->level = $level;
    }
}