<?php

use Pext\Html\DOM\Element;
use Pext\Html\DOM\Node;
use Pext\Html\Tags\Body;
use Pext\Html\Tags\Div;
use Pext\Html\Tags\Head;
use Pext\Html\Tags\Html;
use Pext\Html\Tags\Span;
use Pext\Html\Tags\Template;
use Pext\Html\Tags\Text;
use Pext\Html\Tags\Title;

function Element(
    string $tag,
    mixed $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    array $attributes = [],

    null|array $on = [],
): Node
{
    $node = new Element(
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,

        on: $on,
    );
    return $node->setTag($tag);
}

function Text(string $string): Node {
    return new Text($string);
}

function Html(
    mixed $children = [],
    array|Node $head = null,
    array|Node $body = null,
    null|string|array $class = [],
    null|string|array $style = [],
    null|array $attributes = [],
): Html
    {
        $children ??= [];
        if (is_null($head) === false) {
            $children[] = $head;
        }
        if (is_null($body) === false) {
            $children[] = $body;
        }
    return new Html(
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

function Title(?string $text): Node
{
    return new Title($text);
}

function Head(
    mixed $children = [],
    null|array $attributes = [],
): Node
{
    return new Head(
        $children,
        attributes: $attributes,
    );
}

function Body(
    mixed $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    null|array $attributes = [],

    null|array $on = [],
): Body
{
    return new Body(
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,

        on: $on,
    );
}

function Div(
    mixed $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    null|array $attributes = [],

    null|array $on = [],
): Node
{
    return new Div(
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,

        on: $on,
    );
}

function Template(
    mixed $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    null|array $attributes = [],
): Node
{
    return new Template(
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,
    );
}

/**
 * @param null|array<Node>|Node $children
 * @param null|string|array $class
 * @param null|string|array $style
 * @param array $attributes
 */
function Span(
    mixed $children = [],
    null|string|array $class = [],
    null|string|array $style = [],
    null|array $attributes = [],

    null|array $on = [],
): Node
{
    return new Span(
        $children,
        class: $class,
        style: $style,
        attributes: $attributes,

        on: $on,
    );
}