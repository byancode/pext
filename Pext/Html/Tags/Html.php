<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Html extends Element
{
    public string $tag = 'html';

    public function __construct(
        protected mixed $children = [],
        ?Body $body = null,
        ?Head $head = null,
        ?string $lang = null,
        ?string $title = null,
        ?string $charset = null,
        ?string $favicon = null,
        protected null|string|array $class = [],
        protected null|string|array $style = [],
        protected null|array $attributes = [],
    ) {
        $this->children ??= [];
        $this->attributes ??= [];

        if (!is_null($head)) {
            $this->children[] = $head;
        }
        if (!is_null($body)) {
            $this->children[] = $body;
        }
        if (!is_null($lang)) {
            $this->attributes['lang'] = $lang;
        }
    }
}