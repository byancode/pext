<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Pext\Interfaces\ComponentInterface;
use ReflectionMethod;
use ReflectionClass;
use Throwable;

class Component extends Node implements ComponentInterface {

    function __construct(
        protected $initial = null,
        protected $props = [],
    ) {}

    function render($response): Node {
        return new Node();
    }

    function state(Request $request) {
        return [];
    }

    function onLoading(): ?Node {
        return null;
    }

    function onError(Throwable $e): ?Node {
        return null;
    }

    function onEmpty(): ?Node {
        return null;
    }

    final private function getReflection(): ReflectionClass {
        return new ReflectionClass(get_class($this));
    }

    /**
     * @return ReflectionMethod[]
     */
    final private function getMethods(): array {
        return $this->getReflection()->getMethods();
    }

    /**
     * @return iterable<string>
     */
    final private function getFunctionsWithArgRequest(): iterable {
        foreach ($this->getMethods() as $method) {
            [$parameter] = $method->getParameters();
            $getType     = $parameter?->getType();
            $types       = $getType?->getTypes();

            if (!in_array(Request::class, $types ?? [])) {
                continue;
            }

            yield $method->getName();
        }
    }

    final function route(string $name, array $args = []): string {
        return '';
    }

    final function __toString(): string {
        $state = $this->state($this->request);
        $child = $this->render($state);
        return (string) $child;
    }
}