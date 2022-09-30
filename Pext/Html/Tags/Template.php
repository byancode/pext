<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Template extends Element
{
    public string $tag = 'template';

    public function __construct(
        protected mixed $children = [],
        protected null|string|array $class = [],
        protected null|string|array $style = [],
        protected null|array $attributes = [],
        protected null|string $for = null,
        protected null|string $key = null,
        protected null|string $id = null,
    ) {}
}