<?php

namespace Pext\Html\DOM;

use Pext\Html\Tags\Text;

class Element extends Node
{
    var string $tag = 'html';
    var bool $singleton = false;

    public function __construct(
        protected mixed $children = [],
        protected null|array $attributes = [],
    ) {}

    public function setTag(string $tag): self
    {
        $this->tag = $tag;
        return $this;
    }

    protected function setDefaultValues(): void
    {
        $this->attributes ??= [];
    }

    public function setClass(string|array $value): self
    {
        $this->attributes['class'] = $this->classToString($value);

        return $this;
    }

    public function setStyle(string|array $value): self
    {
        $this->attributes['style'] = $this->styleToString($value);

        return $this;
    }

    private function childrenToArray(): void
    {
        if (!is_array($this->children)) {
            $this->children = [$this->children];
        }
    }

    public function append(mixed $child): self
    {
        $this->childrenToArray();
        $this->children[] = $child;
        return $this;
    }

    public function prepend(mixed $child): self
    {
        $this->childrenToArray();
        array_unshift($this->children, $child);
        return $this;
    }

    public function setAttribute(string $name, mixed $value): self
    {
        if (is_object($value)) {
            $value = json_encode($value, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        }

        $this->attributes[$name] = $value;

        return $this;
    }

    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }

        return $this;
    }

    protected function childToNode(mixed $child): Node {
        if (is_null($child)) {
            return new Node();
        }

        if (is_a($child, Node::class)) {
            return $child;
        }

        if (is_bool($child)) {
            return new Text($child ? 'true' : 'false');
        }

        if (is_string($child) OR is_numeric($child)) {
            return new Text((string) $child);
        }

        return new Node();
    }

    protected function classToString(string|array|null $data = null): string {
        if (is_null($data)) {
            return '';
        }

        if (is_array($data)) {
            return implode(' ', $data);
        }

        return '';
    }

    protected function styleToString(string|array|null $data = null): string {
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

    protected function attributesToString(): string {
        $data = $this->attributes;

        if (is_null($data)) {
            return '';
        }

        if (!is_array($data)) {
            return '';
        }

        $data = array_filter($data);

        if (array_is_list($data)) {
            return join(' ', $data);
        }

        $keys  = array_keys($data);
        $attrs = array_map([$this, 'attributeToString'], $data, $keys);

        return join(' ', $attrs);
    }

    protected function attributeToString(string $key, mixed $value): string {
        if (is_null($value)) {
            return '';
        }

        if (is_bool($value)) {
            return $value ? $key : '';
        }

        $value = (string) $value;
        $value = htmlspecialchars($value);
        return "$key=\"$value\"";
    }

    protected function getChildren(): array {
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
        $this->setDefaultValues();

        $attributes = $this->attributesToString();

        $innerTag = [$this->tag, $attributes];
        $innerTag = implode(' ', array_filter($innerTag));

        if ($this->singleton === true) {
            return "<$innerTag />";
        }

        $children = $this->getChildren();
        $children = implode('', $children);

        return "<$innerTag>$children</$this->tag>";
    }
}
