<?php

namespace Pext\Interfaces;

use Pext\Html\DOM\Node;

interface ComponentInterface {
    public function render($response): Node;
    public function __toString(): string;
}