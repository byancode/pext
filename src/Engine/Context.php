<?php

namespace Pext\Engine;

use Swoole\Http\Request;
use Swoole\Http\Response;

class Context {
    function __construct(
        public Request $request,
        public Response $response
    ) {}
}