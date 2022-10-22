<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\ElementAlpine;

class Script extends ElementAlpine
{
    public string $tag = 'script';
    protected mixed $children = [];

    public function __construct(
        ?string $content = null,
        protected ?array $attributes = [],

        ?array $bind = [],
        ?array $on = [],

        ?string $type = null,
        ?string $src = null,

        ?bool $defer = null,
        ?string $ref = null,
        ?string $id = null,

        ?string $onmessage = null,
        ?string $onerror = null,
        ?string $onload = null,
    ) {
        $content && $this->append(new Text($content));
        $this->setElementAlpineEventAttributes(
            onmessage: $onmessage,
            onerror: $onerror,
            onload: $onload,
        );

        $this->setAttributes([
            'defer'=> $defer,
            'type' => $type,
            'src'  => $src,
        ]);
        $this->setElementAlpineEvents($on);

        $this->setElementAlpineDirectives(
            bind: $bind,
            ref: $ref,
            id: $id,
        );
    }
}