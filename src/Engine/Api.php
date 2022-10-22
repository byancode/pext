<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Swoole\Http\Response;

class Api {
    function __construct(
        public Request $request,
        public Response $response,
    ) {}

    function execute() {
        $this->response->end('');
    }
}