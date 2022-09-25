<?php

namespace Pext\Html;

class Text implements NodeInterface
{
    public function __construct(
        public ?string $text,
    ) {}

    public function __toString(): string
    {
        return $this->text ?? '';
    }
}
