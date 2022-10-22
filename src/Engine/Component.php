<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Pext\Interfaces\ComponentInterface;

class Component implements ComponentInterface {
    public function render($response): Node {
        return new Node();
    }

    public function state(Request $request) {
        return [];
    }

    public function __toString(): string {
        $request = new Request();
        $state = $this->state($request);
        $child = $this->render($state);
        return (string) $child;
    }
}