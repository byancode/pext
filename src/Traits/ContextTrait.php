<?php

namespace Pext\Traits;

use Pext\Engine\Context;

trait ContextTrait {
    public Context $context;

    function __get($name)
    {
        return $this->context?->$name ?? null;
    }

    function setContext(Context $context): void {
        $this->context = $context;
    }
}