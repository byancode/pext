<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Head extends Element
{
    public string $tag = 'head';
    protected null|array $attributes = [];

    public function __construct(
        protected mixed $children = [],
    ) {}
}