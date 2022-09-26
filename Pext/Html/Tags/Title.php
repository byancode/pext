<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Title extends Element
{
    public string $tag = 'title';

    public function __construct(?string $text)
    {
        parent::__construct($text);
    }
}
