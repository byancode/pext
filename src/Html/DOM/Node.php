<?php

namespace Pext\Html\DOM;

use Pext\Engine\Context;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Pext\Traits\ContextTrait;

/**
 * Node base for all Elements
 * @property Request $request
 * @property Response $response
 */
class Node
{
    use ContextTrait;

    public function __toString(): string
    {
        return '';
    }
}