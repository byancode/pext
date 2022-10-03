<?php

use Pext\Html\DOM\Node;
use Pext\Html\Tags\Body;
use Pext\Html\Tags\Button;
use Pext\Html\Tags\Div;
use Pext\Html\Tags\Form;
use Pext\Html\Tags\Head;
use Pext\Html\Tags\Html;
use Pext\Html\Tags\Script;
use Pext\Html\Tags\Span;
use Pext\Html\Tags\Template;
use Pext\Html\Tags\Text;
use Pext\Html\Tags\Title;
use Pext\Html\Tags\Input;


function Text(string $string): Node
{
    return new Text($string);
}

function Html(
    mixed $children = [],
    ?Head $head = null,
    ?Body $body = null,
    null|string|array $class = [],
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
        attributes: $attributes,
    );
}

function Title(?string $text): Node
{
    return new Title($text);
}

function Head(
    mixed $children = [],
): Head
{
    return new Head($children);
}

function Body(
    mixed $children = [],
    null|array $attributes = [],
    null|string|array $style = [],
    null|string|array $class = [],
    null|string|array|bool $data = [],
    ?array $bind = [],
    ?array $on = [],
    ?string $modelable = null,
    ?string $effect = null,
    ?bool $ignore = null,
    ?bool $cloak = null,
    ?string $model = null,
    ?string $mask = null,
    ?string $show = null,
    ?string $init = null,
    ?string $text = null,
    ?string $html = null,
    ?string $ref = null,
    ?string $id = null,
    null|string|array $intersect = null,
    ?string $intersectFull = null,
    ?string $intersectHalf = null,
    ?string $intersectOnce = null,
    ?string $intersectEnter = null,
    ?string $intersectLeave = null,
    ?string $transition = null,
    ?string $transitionEnterStart = null,
    ?string $transitionEnterEnd = null,
    ?string $transitionEnter = null,
    ?string $transitionLeaveStart = null,
    ?string $transitionLeaveEnd = null,
    ?string $transitionLeave = null,
    null|string|bool $transitionOpacity = null,
    null|string|bool $transitionDuration = null,
    null|string|bool $transitionDelay = null,
    null|string|bool $transitionScale = null,
    ?string $onafterprint = null,
    ?string $onbeforeprint = null,
    ?string $onbeforeunload = null,
    ?string $onerror = null,
    ?string $onhashchange = null,
    ?string $onload = null,
    ?string $onmessage = null,
    ?string $onoffline = null,
    ?string $ononline = null,
    ?string $onpagehide = null,
    ?string $onpageshow = null,
    ?string $onpopstate = null,
    ?string $onresize = null,
    ?string $onstorage = null,
    ?string $onunload = null,
    ?string $onclick = null,
    ?string $ondblclick = null,
    ?string $onmousedown = null,
    ?string $onmousemove = null,
    ?string $onmouseout = null,
    ?string $onmouseover = null,
    ?string $onmouseup = null,
    ?string $onmousewheel = null,
    ?string $onwheel = null,
    ?string $ondrag = null,
    ?string $ondragend = null,
    ?string $ondragenter = null,
    ?string $ondragleave = null,
    ?string $ondragover = null,
    ?string $ondragstart = null,
    ?string $ondrop = null,
    ?string $onscroll = null,
    ?string $oncopy = null,
    ?string $oncut = null,
    ?string $onpaste = null,
    ?string $onkeydown = null,
    ?string $onkeypress = null,
    ?string $onkeyup = null
): Body
{
    return new Body(
        $children,
        attributes: $attributes,
        style: $style,
        class: $class,
        data: $data,
        bind: $bind,
        on: $on,
        modelable: $modelable,
        effect: $effect,
        ignore: $ignore,
        cloak: $cloak,
        model: $model,
        mask: $mask,
        show: $show,
        init: $init,
        text: $text,
        html: $html,
        ref: $ref,
        id: $id,
        intersect: $intersect,
        intersectFull: $intersectFull,
        intersectHalf: $intersectHalf,
        intersectOnce: $intersectOnce,
        intersectEnter: $intersectEnter,
        intersectLeave: $intersectLeave,
        transition: $transition,
        transitionEnterStart: $transitionEnterStart,
        transitionEnterEnd: $transitionEnterEnd,
        transitionEnter: $transitionEnter,
        transitionLeaveStart: $transitionLeaveStart,
        transitionLeaveEnd: $transitionLeaveEnd,
        transitionLeave: $transitionLeave,
        transitionOpacity: $transitionOpacity,
        transitionDuration: $transitionDuration,
        transitionDelay: $transitionDelay,
        transitionScale: $transitionScale,
        onafterprint: $onafterprint,
        onbeforeprint: $onbeforeprint,
        onbeforeunload: $onbeforeunload,
        onerror: $onerror,
        onhashchange: $onhashchange,
        onload: $onload,
        onmessage: $onmessage,
        onoffline: $onoffline,
        ononline: $ononline,
        onpagehide: $onpagehide,
        onpageshow: $onpageshow,
        onpopstate: $onpopstate,
        onresize: $onresize,
        onstorage: $onstorage,
        onunload: $onunload,
        onclick: $onclick,
        ondblclick: $ondblclick,
        onmousedown: $onmousedown,
        onmousemove: $onmousemove,
        onmouseout: $onmouseout,
        onmouseover: $onmouseover,
        onmouseup: $onmouseup,
        onmousewheel: $onmousewheel,
        onwheel: $onwheel,
        ondrag: $ondrag,
        ondragend: $ondragend,
        ondragenter: $ondragenter,
        ondragleave: $ondragleave,
        ondragover: $ondragover,
        ondragstart: $ondragstart,
        ondrop: $ondrop,
        onscroll: $onscroll,
        oncopy: $oncopy,
        oncut: $oncut,
        onpaste: $onpaste,
        onkeydown: $onkeydown,
        onkeypress: $onkeypress,
        onkeyup: $onkeyup,
    );
}

function Div(
    mixed $children = [],
    null|array $attributes = [],

    null|string|array $style = [],
    null|string|array $class = [],

    null|string|array|bool $data = [],
    null|array $bind = [],
    null|array $on = [],

    null|string $modelable = null,
    null|string $effect = null,
    null|bool $ignore = null,
    null|bool $cloak = null,
    null|string $model = null,
    null|string $mask = null,
    null|string $show = null,
    null|string $init = null,
    null|string $text = null,
    null|string $html = null,
    null|string $ref = null,
    null|string $id = null,

    null|string|array $intersect = null,
    null|string $intersectFull = null,
    null|string $intersectHalf = null,
    null|string $intersectOnce = null,
    null|string $intersectEnter = null,
    null|string $intersectLeave = null,

    null|string $transition = null,
    null|string $transitionEnterStart = null,
    null|string $transitionEnterEnd = null,
    null|string $transitionEnter = null,
    null|string $transitionLeaveStart = null,
    null|string $transitionLeaveEnd = null,
    null|string $transitionLeave = null,
    null|string|bool $transitionOpacity = null,
    null|string|bool $transitionDuration = null,
    null|string|bool $transitionDelay = null,
    null|string|bool $transitionScale = null,

    // Keyboard Events
    ?string $onclick = null,
    ?string $ondblclick = null,
    ?string $onmousedown = null,
    ?string $onmousemove = null,
    ?string $onmouseout = null,
    ?string $onmouseover = null,
    ?string $onmouseup = null,
    ?string $onmousewheel = null,
    ?string $onwheel = null,
    // Drag and drop events
    ?string $ondrag = null,
    ?string $ondragend = null,
    ?string $ondragenter = null,
    ?string $ondragleave = null,
    ?string $ondragover = null,
    ?string $ondragstart = null,
    ?string $ondrop = null,
    ?string $onscroll = null,
    // Clipboard Events
    ?string $oncopy = null,
    ?string $oncut = null,
    ?string $onpaste = null,
    ?string $onkeydown = null,
    ?string $onkeypress = null,
    ?string $onkeyup = null,
): Div
{
    return new Div(
        class: $class,
        style: $style,
        children: $children,
        attributes: $attributes,
        transitionEnterStart: $transitionEnterStart,
        transitionEnterEnd: $transitionEnterEnd,
        transitionEnter: $transitionEnter,
        transitionLeaveStart: $transitionLeaveStart,
        transitionLeaveEnd: $transitionLeaveEnd,
        transitionLeave: $transitionLeave,
        transitionOpacity: $transitionOpacity,
        transitionDuration: $transitionDuration,
        transitionDelay: $transitionDelay,
        transitionScale: $transitionScale,
        transition: $transition,
        intersectEnter: $intersectEnter,
        intersectLeave: $intersectLeave,
        intersectFull: $intersectFull,
        intersectHalf: $intersectHalf,
        intersectOnce: $intersectOnce,
        intersect: $intersect,
        // Keyboard Events
        onclick: $onclick,
        ondblclick: $ondblclick,
        onmousedown: $onmousedown,
        onmousemove: $onmousemove,
        onmouseout: $onmouseout,
        onmouseover: $onmouseover,
        onmouseup: $onmouseup,
        onmousewheel: $onmousewheel,
        onwheel: $onwheel,
        // Drag and drop events
        ondrag: $ondrag,
        ondragend: $ondragend,
        ondragenter: $ondragenter,
        ondragleave: $ondragleave,
        ondragover: $ondragover,
        ondragstart: $ondragstart,
        ondrop: $ondrop,
        onscroll: $onscroll,
        // Clipboard Events
        oncopy: $oncopy,
        oncut: $oncut,
        onpaste: $onpaste,
        onkeydown: $onkeydown,
        onkeypress: $onkeypress,
        onkeyup: $onkeyup,
        modelable: $modelable,
        effect: $effect,
        ignore: $ignore,
        cloak: $cloak,
        model: $model,
        data: $data,
        bind: $bind,
        mask: $mask,
        show: $show,
        init: $init,
        text: $text,
        html: $html,
        ref: $ref,
        id: $id,
        on: $on,
    );
}

function Template(
    mixed $children = [],
    null|array $attributes = [],
    null|string $type = null,
    null|string $for = null,
    null|string $key = null,
    null|string $if = null,
): Template
{
    return new Template(
        $children,
        attributes: $attributes,
        type: $type,
        for: $for,
        key: $key,
        if: $if,
    );
}

function Span(
    mixed $children = [],
    null|array $attributes = [],

    null|string|array $style = [],
    null|string|array $class = [],

    null|string|array|bool $data = [],
    null|array $bind = [],
    null|array $on = [],

    null|string $modelable = null,
    null|string $effect = null,
    null|bool $ignore = null,
    null|bool $cloak = null,
    null|string $model = null,
    null|string $mask = null,
    null|string $show = null,
    null|string $init = null,
    null|string $text = null,
    null|string $html = null,
    null|string $ref = null,
    null|string $id = null,

    null|string|array $intersect = null,
    null|string $intersectFull = null,
    null|string $intersectHalf = null,
    null|string $intersectOnce = null,
    null|string $intersectEnter = null,
    null|string $intersectLeave = null,

    null|string $transition = null,
    null|string $transitionEnterStart = null,
    null|string $transitionEnterEnd = null,
    null|string $transitionEnter = null,
    null|string $transitionLeaveStart = null,
    null|string $transitionLeaveEnd = null,
    null|string $transitionLeave = null,
    null|string|bool $transitionOpacity = null,
    null|string|bool $transitionDuration = null,
    null|string|bool $transitionDelay = null,
    null|string|bool $transitionScale = null,

    // Keyboard Events
    ?string $onclick = null,
    ?string $ondblclick = null,
    ?string $onmousedown = null,
    ?string $onmousemove = null,
    ?string $onmouseout = null,
    ?string $onmouseover = null,
    ?string $onmouseup = null,
    ?string $onmousewheel = null,
    ?string $onwheel = null,
    // Drag and drop events
    ?string $ondrag = null,
    ?string $ondragend = null,
    ?string $ondragenter = null,
    ?string $ondragleave = null,
    ?string $ondragover = null,
    ?string $ondragstart = null,
    ?string $ondrop = null,
    ?string $onscroll = null,
    // Clipboard Events
    ?string $oncopy = null,
    ?string $oncut = null,
    ?string $onpaste = null,
    ?string $onkeydown = null,
    ?string $onkeypress = null,
    ?string $onkeyup = null,
): Span
{
    return new Span(
        class: $class,
        style: $style,
        children: $children,
        attributes: $attributes,
        transitionEnterStart: $transitionEnterStart,
        transitionEnterEnd: $transitionEnterEnd,
        transitionEnter: $transitionEnter,
        transitionLeaveStart: $transitionLeaveStart,
        transitionLeaveEnd: $transitionLeaveEnd,
        transitionLeave: $transitionLeave,
        transitionOpacity: $transitionOpacity,
        transitionDuration: $transitionDuration,
        transitionDelay: $transitionDelay,
        transitionScale: $transitionScale,
        transition: $transition,
        intersectEnter: $intersectEnter,
        intersectLeave: $intersectLeave,
        intersectFull: $intersectFull,
        intersectHalf: $intersectHalf,
        intersectOnce: $intersectOnce,
        intersect: $intersect,
        // Keyboard Events
        onclick: $onclick,
        ondblclick: $ondblclick,
        onmousedown: $onmousedown,
        onmousemove: $onmousemove,
        onmouseout: $onmouseout,
        onmouseover: $onmouseover,
        onmouseup: $onmouseup,
        onmousewheel: $onmousewheel,
        onwheel: $onwheel,
        // Drag and drop events
        ondrag: $ondrag,
        ondragend: $ondragend,
        ondragenter: $ondragenter,
        ondragleave: $ondragleave,
        ondragover: $ondragover,
        ondragstart: $ondragstart,
        ondrop: $ondrop,
        onscroll: $onscroll,
        // Clipboard Events
        oncopy: $oncopy,
        oncut: $oncut,
        onpaste: $onpaste,
        onkeydown: $onkeydown,
        onkeypress: $onkeypress,
        onkeyup: $onkeyup,
        modelable: $modelable,
        effect: $effect,
        ignore: $ignore,
        cloak: $cloak,
        model: $model,
        data: $data,
        bind: $bind,
        mask: $mask,
        show: $show,
        init: $init,
        text: $text,
        html: $html,
        ref: $ref,
        id: $id,
        on: $on,
    );
}

function Script(
    ?string $content = null,
    ?array $attributes = [],

    ?array $bind = [],
    ?array $on = [],

    ?bool $defer = null,
    ?string $src = null,
    ?string $ref = null,
    ?string $id = null,

    ?string $onmessage = null,
    ?string $onerror = null,
    ?string $onload = null,
) : Script
{
    return new Script(
        content: $content,
        attributes: $attributes,
        defer: $defer,
        src: $src,
        ref: $ref,
        id: $id,
        onmessage: $onmessage,
        onerror: $onerror,
        onload: $onload,
        bind: $bind,
        on: $on,
    );
}

function Form(
    mixed $children = [],
    null|array $attributes = [],

    null|string|array $style = [],
    null|string|array $class = [],

    null|string $enctype = null,
    null|string $method = null,
    null|string $action = null,

    null|string|array|bool $data = [],
    null|array $bind = [],
    null|array $on = [],

    null|string $modelable = null,
    null|string $effect = null,
    null|bool $ignore = null,
    null|bool $cloak = null,
    null|string $model = null,
    null|string $mask = null,
    null|string $show = null,
    null|string $init = null,
    null|string $text = null,
    null|string $html = null,
    null|string $ref = null,
    null|string $id = null,

    null|string|array $intersect = null,
    null|string $intersectFull = null,
    null|string $intersectHalf = null,
    null|string $intersectOnce = null,
    null|string $intersectEnter = null,
    null|string $intersectLeave = null,

    null|string $transition = null,
    null|string $transitionEnterStart = null,
    null|string $transitionEnterEnd = null,
    null|string $transitionEnter = null,
    null|string $transitionLeaveStart = null,
    null|string $transitionLeaveEnd = null,
    null|string $transitionLeave = null,
    null|string|bool $transitionOpacity = null,
    null|string|bool $transitionDuration = null,
    null|string|bool $transitionDelay = null,
    null|string|bool $transitionScale = null,

    // Keyboard Events
    ?string $onclick = null,
    ?string $ondblclick = null,
    ?string $onmousedown = null,
    ?string $onmousemove = null,
    ?string $onmouseout = null,
    ?string $onmouseover = null,
    ?string $onmouseup = null,
    ?string $onmousewheel = null,
    ?string $onwheel = null,
    // Drag and drop events
    ?string $ondrag = null,
    ?string $ondragend = null,
    ?string $ondragenter = null,
    ?string $ondragleave = null,
    ?string $ondragover = null,
    ?string $ondragstart = null,
    ?string $ondrop = null,
    ?string $onscroll = null,
    // Clipboard Events
    ?string $oncopy = null,
    ?string $oncut = null,
    ?string $onpaste = null,
    ?string $onkeydown = null,
    ?string $onkeypress = null,
    ?string $onkeyup = null,
    // Form Events
    ?string $onreset = null,
    ?string $onsubmit = null,
) : Form
{
    return new Form(
        children: $children,
        attributes: $attributes,
        style: $style,
        class: $class,
        enctype: $enctype,
        method: $method,
        action: $action,
        data: $data,
        bind: $bind,
        on: $on,
        modelable: $modelable,
        effect: $effect,
        ignore: $ignore,
        cloak: $cloak,
        model: $model,
        mask: $mask,
        show: $show,
        init: $init,
        text: $text,
        html: $html,
        ref: $ref,
        id: $id,
        intersectEnter: $intersectEnter,
        intersectLeave: $intersectLeave,
        intersectFull: $intersectFull,
        intersectHalf: $intersectHalf,
        intersectOnce: $intersectOnce,
        intersect: $intersect,
        transitionEnterStart: $transitionEnterStart,
        transitionEnterEnd: $transitionEnterEnd,
        transitionEnter: $transitionEnter,
        transitionLeaveStart: $transitionLeaveStart,
        transitionLeaveEnd: $transitionLeaveEnd,
        transitionLeave: $transitionLeave,
        transitionOpacity: $transitionOpacity,
        transitionDuration: $transitionDuration,
        transitionDelay: $transitionDelay,
        transitionScale: $transitionScale,
        transition: $transition,
        // Keyboard Events
        onclick: $onclick,
        ondblclick: $ondblclick,
        onmousedown: $onmousedown,
        onmousemove: $onmousemove,
        onmouseout: $onmouseout,
        onmouseover: $onmouseover,
        onmouseup: $onmouseup,
        onmousewheel: $onmousewheel,
        onwheel: $onwheel,
        // Drag and drop events
        ondrag: $ondrag,
        ondragend: $ondragend,
        ondragenter: $ondragenter,
        ondragleave: $ondragleave,
        ondragover: $ondragover,
        ondragstart: $ondragstart,
        ondrop: $ondrop,
        onscroll: $onscroll,
        // Clipboard Events
        oncopy: $oncopy,
        oncut: $oncut,
        onpaste: $onpaste,
        onkeydown: $onkeydown,
        onkeypress: $onkeypress,
        onkeyup: $onkeyup,
        // Form Events
        onreset: $onreset,
        onsubmit: $onsubmit,
    );
}

function Input(
    mixed $children = [],
    null|array $attributes = [],

    null|string|array $style = [],
    null|string|array $class = [],

    null|string|array|bool $data = [],
    null|array $bind = [],
    null|array $on = [],

    null|string $name = null,
    null|string $type = null,
    null|string $value = null,

    null|string $modelable = null,
    null|string $effect = null,
    null|bool $ignore = null,
    null|bool $cloak = null,
    null|string $model = null,
    null|string $mask = null,
    null|string $show = null,
    null|string $init = null,
    null|string $text = null,
    null|string $html = null,
    null|string $ref = null,
    null|string $id = null,

    null|string|array $intersect = null,
    null|string $intersectFull = null,
    null|string $intersectHalf = null,
    null|string $intersectOnce = null,
    null|string $intersectEnter = null,
    null|string $intersectLeave = null,

    null|string $transition = null,
    null|string $transitionEnterStart = null,
    null|string $transitionEnterEnd = null,
    null|string $transitionEnter = null,
    null|string $transitionLeaveStart = null,
    null|string $transitionLeaveEnd = null,
    null|string $transitionLeave = null,
    null|string|bool $transitionOpacity = null,
    null|string|bool $transitionDuration = null,
    null|string|bool $transitionDelay = null,
    null|string|bool $transitionScale = null,

    // Keyboard Events
    ?string $onclick = null,
    ?string $ondblclick = null,
    ?string $onmousedown = null,
    ?string $onmousemove = null,
    ?string $onmouseout = null,
    ?string $onmouseover = null,
    ?string $onmouseup = null,
    ?string $onmousewheel = null,
    ?string $onwheel = null,
    // Drag and drop events
    ?string $ondrag = null,
    ?string $ondragend = null,
    ?string $ondragenter = null,
    ?string $ondragleave = null,
    ?string $ondragover = null,
    ?string $ondragstart = null,
    ?string $ondrop = null,
    ?string $onscroll = null,
    // Clipboard Events
    ?string $oncopy = null,
    ?string $oncut = null,
    ?string $onpaste = null,
    ?string $onkeydown = null,
    ?string $onkeypress = null,
    ?string $onkeyup = null,
    // Form Events
    ?string $onblur = null,
    ?string $onchange = null,
    ?string $oncontextmenu = null,
    ?string $onfocus = null,
    ?string $oninput = null,
    ?string $oninvalid = null,
    ?string $onreset = null,
    ?string $onsearch = null,
    ?string $onselect = null,
    ?string $onsubmit = null,
): Input
{
    return new Input(
        children: $children,
        attributes: $attributes,
        style: $style,
        class: $class,
        data: $data,
        bind: $bind,
        on: $on,
        name: $name,
        type: $type,
        value: $value,
        modelable: $modelable,
        effect: $effect,
        ignore: $ignore,
        cloak: $cloak,
        model: $model,
        mask: $mask,
        show: $show,
        init: $init,
        text: $text,
        html: $html,
        ref: $ref,
        id: $id,
        intersectEnter: $intersectEnter,
        intersectLeave: $intersectLeave,
        intersectFull: $intersectFull,
        intersectHalf: $intersectHalf,
        intersectOnce: $intersectOnce,
        intersect: $intersect,
        transitionEnterStart: $transitionEnterStart,
        transitionEnterEnd: $transitionEnterEnd,
        transitionEnter: $transitionEnter,
        transitionLeaveStart: $transitionLeaveStart,
        transitionLeaveEnd: $transitionLeaveEnd,
        transitionLeave: $transitionLeave,
        transitionOpacity: $transitionOpacity,
        transitionDuration: $transitionDuration,
        transitionDelay: $transitionDelay,
        transitionScale: $transitionScale,
        transition: $transition,
        // Keyboard Events
        onclick: $onclick,
        ondblclick: $ondblclick,
        onmousedown: $onmousedown,
        onmousemove: $onmousemove,
        onmouseout: $onmouseout,
        onmouseover: $onmouseover,
        onmouseup: $onmouseup,
        onmousewheel: $onmousewheel,
        onwheel: $onwheel,
        // Drag and drop events
        ondrag: $ondrag,
        ondragend: $ondragend,
        ondragenter: $ondragenter,
        ondragleave: $ondragleave,
        ondragover: $ondragover,
        ondragstart: $ondragstart,
        ondrop: $ondrop,
        onscroll: $onscroll,
        // Clipboard Events
        oncopy: $oncopy,
        oncut: $oncut,
        onpaste: $onpaste,
        onkeydown: $onkeydown,
        onkeypress: $onkeypress,
        onkeyup: $onkeyup,
        // Form Events
        onblur: $onblur,
        onchange: $onchange,
        oncontextmenu: $oncontextmenu,
        onfocus: $onfocus,
        oninput: $oninput,
        oninvalid: $oninvalid,
        onreset: $onreset,
        onsearch: $onsearch,
        onselect: $onselect,
        onsubmit: $onsubmit,
    );
}

function Button(
    mixed $children = [],
    null|array $attributes = [],

    null|string|array $style = [],
    null|string|array $class = [],

    null|string|array|bool $data = [],
    null|array $bind = [],
    null|array $on = [],

    null|string $name = null,
    null|string $type = null,
    null|string $value = null,

    null|string $modelable = null,
    null|string $effect = null,
    null|bool $ignore = null,
    null|bool $cloak = null,
    null|string $model = null,
    null|string $mask = null,
    null|string $show = null,
    null|string $init = null,
    null|string $text = null,
    null|string $html = null,
    null|string $ref = null,
    null|string $id = null,

    null|string|array $intersect = null,
    null|string $intersectFull = null,
    null|string $intersectHalf = null,
    null|string $intersectOnce = null,
    null|string $intersectEnter = null,
    null|string $intersectLeave = null,

    null|string $transition = null,
    null|string $transitionEnterStart = null,
    null|string $transitionEnterEnd = null,
    null|string $transitionEnter = null,
    null|string $transitionLeaveStart = null,
    null|string $transitionLeaveEnd = null,
    null|string $transitionLeave = null,
    null|string|bool $transitionOpacity = null,
    null|string|bool $transitionDuration = null,
    null|string|bool $transitionDelay = null,
    null|string|bool $transitionScale = null,

    // Keyboard Events
    ?string $onclick = null,
    ?string $ondblclick = null,
    ?string $onmousedown = null,
    ?string $onmousemove = null,
    ?string $onmouseout = null,
    ?string $onmouseover = null,
    ?string $onmouseup = null,
    ?string $onmousewheel = null,
    ?string $onwheel = null,
    // Drag and drop events
    ?string $ondrag = null,
    ?string $ondragend = null,
    ?string $ondragenter = null,
    ?string $ondragleave = null,
    ?string $ondragover = null,
    ?string $ondragstart = null,
    ?string $ondrop = null,
    ?string $onscroll = null,
): Button {
    return new Button(
        children: $children,
        attributes: $attributes,
        style: $style,
        class: $class,
        data: $data,
        bind: $bind,
        on: $on,
        name: $name,
        type: $type,
        value: $value,
        modelable: $modelable,
        effect: $effect,
        ignore: $ignore,
        cloak: $cloak,
        model: $model,
        mask: $mask,
        show: $show,
        init: $init,
        text: $text,
        html: $html,
        ref: $ref,
        id: $id,
        intersectEnter: $intersectEnter,
        intersectLeave: $intersectLeave,
        intersectFull: $intersectFull,
        intersectHalf: $intersectHalf,
        intersectOnce: $intersectOnce,
        intersect: $intersect,
        transitionEnterStart: $transitionEnterStart,
        transitionEnterEnd: $transitionEnterEnd,
        transitionEnter: $transitionEnter,
        transitionLeaveStart: $transitionLeaveStart,
        transitionLeaveEnd: $transitionLeaveEnd,
        transitionLeave: $transitionLeave,
        transitionOpacity: $transitionOpacity,
        transitionDuration: $transitionDuration,
        transitionDelay: $transitionDelay,
        transitionScale: $transitionScale,
        transition: $transition,
        // Keyboard Events
        onclick: $onclick,
        ondblclick: $ondblclick,
        onmousedown: $onmousedown,
        onmousemove: $onmousemove,
        onmouseout: $onmouseout,
        onmouseover: $onmouseover,
        onmouseup: $onmouseup,
        onmousewheel: $onmousewheel,
        onwheel: $onwheel,
        // Drag and drop events
        ondrag: $ondrag,
        ondragend: $ondragend,
        ondragenter: $ondragenter,
        ondragleave: $ondragleave,
        ondragover: $ondragover,
        ondragstart: $ondragstart,
        ondrop: $ondrop,
        onscroll: $onscroll,
    );
}