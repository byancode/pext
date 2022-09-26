<?php

namespace Pext\Html\DOM;

use Pext\Html\Tags\Text;

class Element extends Node
{
    public string $tag = '';

    public function __construct(
        protected mixed $children = [],
        protected null|string|array $class = [],
        protected null|string|array $style = [],
        protected null|array $attributes = [],

        protected null|array $on = [],
    ) {
        $this->on ??= [];
        $this->children ??= [];
        $this->attributes ??= [];

        foreach ($this->on as $name => $value) {
            $this->setEventToAttribute($name, $value);
        }
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;
        return $this;
    }

    function setEventToAttribute(string $event, string $attribute): void
    {
        $this->attributes['@'.$event] = $attribute;
    }

    private function childToNode(mixed $child): Node {
        if (is_null($child)) {
            return new Node();
        }

        if (is_a($child, Node::class)) {
            return $child;
        }

        if (is_bool($child)) {
            return new Text($child ? 'true' : 'false');
        }

        if (    is_string($child)
            OR  is_numeric($child)
        ) {
            return new Text((string) $child);
        }

        return new Node();
    }

    private function classToString(string|array|null $data = null): string {
        if (is_null($data)) {
            return '';
        }

        if (is_array($data)) {
            return implode(' ', $data);
        }

        return '';
    }

    private function styleToString(string|array|null $data = null): string {
        if (is_null($data)) {
            return '';
        }

        if (is_string($data)) {
            return $data;
        }

        if (!is_array($data)) {
            return '';
        }

        if (array_is_list($data)) {
            return implode(';', $data);
        }

        $callback = fn($value, $key) => "$key: $value;";
        return implode('', array_map($callback, $data, array_keys($data)));
    }

    private function attributesToString(string|array|null $data = null): string {
        if (is_null($data)) {
            return '';
        }

        if (!is_array($data)) {
            return '';
        }

        if (array_is_list($data)) {
            $attrs = $this->attributes;
        } else {
            $keys = array_keys($data);
            $callback = function($value, $key) {
                $value = htmlspecialchars($value);
                return "$key=\"$value\"";
            };
            $attrs = array_map($callback, $data, $keys);
        }

        return join(' ', $attrs);
    }

    private function getChildren(): array {
        if (is_a($this->children, Node::class)) {
            return [$this->children];
        } elseif (is_array($this->children)) {
            if (array_is_list($this->children)) {
                $callback = fn($child) => $this->childToNode($child);
                return array_map($callback, $this->children);
            } else {
                $text = json_encode($this->children, JSON_PRETTY_PRINT);
                return [$this->childToNode($text)];
            }
        } elseif (is_object($this->children)) {
            $text = json_encode($this->children, JSON_PRETTY_PRINT);
            return [$this->childToNode($text)];
        } else {
            return [$this->childToNode($this->children)];
        }
    }

    public function __toString(): string
    {
        $children = $this->getChildren();
        $children = implode('', $children);

        $attributes = $this->attributes ?? [];
        $attributes['class'] = join(' ', array_filter([
            $this->classToString($this->class),
            $this->classToString($attributes['class'] ?? null),
        ]));
        $attributes['style'] = join('', [
            $this->styleToString($this->style),
            $this->styleToString($attributes['style'] ?? null),
        ]);
        $attributes = array_filter($attributes);
        $attributes = $this->attributesToString($attributes);

        $innerTag = [$this->tag, $attributes];
        $innerTag = implode(' ', array_filter($innerTag));

        return "<$innerTag>$children</$this->tag>";
    }
}
