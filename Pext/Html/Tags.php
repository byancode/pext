<?php

use Pext\Html\NodeInterface;
use Pext\Html\Element;
use Pext\Html\Text;

function Element(
    string $tag,
    null|string|array|NodeInterface $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],
): NodeInterface
{
    return new Element(
        $tag,
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

function Text(string $string): NodeInterface {
    return new Text($string);
}

function Html(
    null|string|array|NodeInterface $children = [],
    array|NodeInterface $head = null,
    array|NodeInterface $body = null,
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],
): NodeInterface
{
    $children ??= [];
    if (is_null($head) === false) {
        $children[] = $head;
    }
    if (is_null($body) === false) {
        $children[] = $body;
    }
    return new Element(
        'html',
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

function Title(string $title = 'Pext by Byancode'): NodeInterface
{
    return new Element(
        'title',
        $title,
    );
}

function Head(
    string|NodeInterface $title = 'Pext by Byancode',
    null|array|NodeInterface $children = [],
    array $attributes = [],
): NodeInterface
{
    $children ??= [];
    $children[] = Title($title);

    return new Element(
        'head',
        $children,
        attributes: $attributes,
    );
}

function Body(
    null|string|array|NodeInterface $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],
): NodeInterface
{
    return new Element(
        'body',
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

function Div(
    null|string|array|NodeInterface $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],
    string $onLongPress = '',
): NodeInterface
{
    return new Element(
        'div',
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

/**
 * @param null|array<NodeInterface>|NodeInterface $children
 * @param null|string|array $class
 * @param null|string|array $style
 * @param array $attributes
 */
function Span(
    null|string|array|NodeInterface $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],
): NodeInterface
{
    return new Element(
        'span',
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

function H1(
    null|string|array|NodeInterface $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],
): NodeInterface
{
    return new Element(
        'h1',
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}
