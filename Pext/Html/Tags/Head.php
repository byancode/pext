<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Head extends Element
{
    public string $tag = 'head';
    protected mixed $children = [];
    protected null|array $attributes = [];

    public function __construct() {}
}