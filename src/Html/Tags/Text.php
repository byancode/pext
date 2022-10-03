<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Node;

class Text extends Node
{
    public function __construct(
        public ?string $text,
    ) {}

    public function __toString(): string
    {
        return $this->text ?? '';
    }
}
