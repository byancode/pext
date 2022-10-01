<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\ElementAlpine;

class Template extends ElementAlpine
{
    public string $tag = 'template';

    public function __construct(
        protected mixed $children = [],
        protected null|array $attributes = [],
        null|string $type = null,

        null|string $for = null,
        null|string $key = null,
        null|string $if = null,
    ) {
        $this->setAttribute('type', $type);
        $this->setAlpineTemplateDirectives(
            for: $for,
            key: $key,
            if: $if,
        );
    }
}