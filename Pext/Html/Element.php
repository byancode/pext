<?php

namespace Pext\Html;

class Element implements NodeInterface
{
    public function __construct(
        public string $tag,
        public null|string|array|NodeInterface $children = [],
        public string|array $class = [],
        public string|array $style = [],
        public array $attributes = [],
    ) {}

    public function __toString(): string
    {
        $attributes = $this->attributes ?? [];
        $children = '';

        if (is_string($this->children)) {
            $children = Text($this->children);

        } elseif (is_array($this->children)) {
            foreach ($this->children as $child) {
                if (is_a($child, self::class) || is_a($child, Text::class)) {
                    $children .= (string) $child;
                } else {
                    throw new \Exception('Invalid child type');
                }
            }
        } elseif (is_a($this->children, self::class) || is_a($this->children, Text::class)) {
            $children = (string) $this->children;
        }

        if (is_array($this->class)) {
            $attributes['class'] = implode(' ', $this->class);
        } elseif (is_string($this->class)) {
            $attributes['class'] = $this->class;
        }

        if (is_array($this->style)) {
            $style = array_map(function ($key, $value) {
                return "$key: $value;";
            }, array_keys($this->style), $this->style);

            $attributes['style'] = implode(' ', $style);
        } elseif (is_string($this->style)) {
            $attributes['style'] = $this->style;
        }

        $attributes = array_map(function ($key, $value) {
            return "$key=\"$value\"";
        }, array_keys($attributes), $attributes);

        $attributes = implode(' ', $attributes);

        $innerTag = [$this->tag, $attributes];
        $innerTag = implode(' ', array_filter($innerTag));

        return "<$innerTag>$children</$this->tag>";
    }
}
