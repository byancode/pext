<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Pext\Interfaces\ComponentInterface;

class Component implements ComponentInterface {
    public function render($response): Node {
        return new Node();
    }

    public function controller(Request $request) {
        return [];
    }

    public function __toString(): string {
        $request = new Request();
        $response = $this->controller($request);
        $child = $this->render($response);
        return (string) $child;
    }
}