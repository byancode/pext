<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Pext\Traits\ContextTrait;

/**
 * Page base for all pages
 * @property Request $request
 * @property Response $response
 */
class Page {
    use ContextTrait;

    function init(): void {
        $this->response->header('Content-Type', 'text/html');
    }


    function controller(Request $request) {
        return [];
    }

    function render(Result $result): Node {
        return new Node();
    }


    function match(Request $request): bool {
        return true;
    }

    final function __toString(): string {
        $request = $this->context->request;

        $result  = $this->controller($request);
        $result  = new Result($result);

        $content = $this->render($result);
        $content->setContext($this->context);

        return (string) $content;
    }
}