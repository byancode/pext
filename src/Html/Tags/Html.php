<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\Element;

class Html extends Element
{
    public string $tag = 'html';
    protected mixed $children = [];

    public function __construct(
        null|Head|array $head = null,
        ?Node $body = null,
        protected null|array $attributes = [],
        null|string|array $class = [],
        ?string $title = null,
    ) {
        $this->children ??= [];

        if (isset($head)) {
            if (is_array($head)) {
                $head = new Head($head);
            }
            if (isset($title)) {
                $title = new Title($title);
                $head->append($title);
            }
            $this->children[] = $head;
        }

        if (isset($body)) {
            $children[] = $body;
        }

        $this->setClass($class);
    }
}