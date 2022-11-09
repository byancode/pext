<?php

namespace Pext\Engine;

class Result
{
    function __construct(
        public $data = null,
    ) {}

    function get(string $key, $default = null): mixed
    {
        return data_get($this->all(), $key, $default);
    }

    function all(): array
    {
        return (array)$this->data;
    }

    function isEmtpy(): bool
    {
        return empty($this->data);
    }

    function __toString(): string
    {
        if (is_array($this->data)) {
            return json_encode($this->data);
        }
        return (string) $this->data;
    }
}