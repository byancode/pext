<?php

namespace Pext\Html\Tags;

use Pext\Html\DOM\ElementAlpine;

class Input extends ElementAlpine
{
    var string $tag = 'input';
    var bool $singleton = true;

    public function __construct(
        protected mixed $children = [],
        protected null|array $attributes = [],

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
    ) {

        $this->setElementAlpineTransitionDirectives(
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
        );

        $this->setElementAlpineIntersectDirectives(
            intersectEnter: $intersectEnter,
            intersectLeave: $intersectLeave,
            intersectFull: $intersectFull,
            intersectHalf: $intersectHalf,
            intersectOnce: $intersectOnce,
            intersect: $intersect,
        );

        $this->setElementAlpineEventAttributes(
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

        $this->setElementAlpineEvents($on);
        $this->setElementAlpineClass($class);
        $this->setElementAlpineStyle($style);

        $this->setAttributes(compact('name', 'type', 'value'));

        $this->setElementAlpineDirectives(
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
        );
    }
}