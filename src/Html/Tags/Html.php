<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Html extends Element
{
    public string $tag = 'html';

    public function __construct(
        protected mixed $children = [],
        protected null|array $attributes = [],

        null|string|array $class = [],
    ) {
        $this->setClass($class);
    }
}