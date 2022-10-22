<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Swoole\Http\Response;

class Page {
    function __construct(
        public Request $request,
        public Response $response,
    ) {}

    function init(
        Request $request,
    ) {}

    function build(
        Request $request,
    ): Node {
        return new Node();
    }

    function render() {
        $this->response->end(
            $this->build($this->request),
        );
    }
}