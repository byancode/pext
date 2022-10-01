<?php

namespace Pext\Html\DOM;

class ElementAlpine extends Element
{
    public function setAlpineEvent(string $name, string $value): self
    {
        return $this->setAttribute("@$name", $value);
    }

    public function setAlpineEvents(null|array $events): self
    {
        $events ??= $this->getAttribute('x-on');
        $events ??= $this->getAttribute('on');
        $this->removeAttributes('x-on', 'on');

        if (is_null($events)) {
            return $this;
        }

        foreach ($events as $name => $value) {
            $this->setEvent($name, $value);
        }

        return $this;
    }


    public function setAlpineEventAttributes(
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
        // Media Events
        ?string $onabort = null,
        ?string $oncanplay = null,
        ?string $oncanplaythrough = null,
        ?string $oncuechange = null,
        ?string $ondurationchange = null,
        ?string $onemptied = null,
        ?string $onended = null,
        ?string $onloadeddata = null,
        ?string $onloadedmetadata = null,
        ?string $onloadstart = null,
        ?string $onpause = null,
        ?string $onplay = null,
        ?string $onplaying = null,
        ?string $onprogress = null,
        ?string $onratechange = null,
        ?string $onseeked = null,
        ?string $onseeking = null,
        ?string $onstalled = null,
        ?string $onsuspend = null,
        ?string $ontimeupdate = null,
        ?string $onvolumechange = null,
        ?string $onwaiting = null,
    ): self
    {
        foreach ([
            'afterprint',
            'beforeprint',
            'beforeunload',
            'error',
            'hashchange',
            'load',
            'message',
            'offline',
            'online',
            'pagehide',
            'pageshow',
            'popstate',
            'resize',
            'storage',
            'unload',
            'blur',
            'change',
            'contextmenu',
            'focus',
            'input',
            'invalid',
            'reset',
            'search',
            'select',
            'submit',
            'click',
            'dblclick',
            'mousedown',
            'mousemove',
            'mouseout',
            'mouseover',
            'mouseup',
            'mousewheel',
            'wheel',
            'drag',
            'dragend',
            'dragenter',
            'dragleave',
            'dragover',
            'dragstart',
            'drop',
            'scroll',
            'copy',
            'cut',
            'paste',
            'keydown',
            'keypress',
            'keyup',
            'abort',
            'canplay',
            'canplaythrough',
            'cuechange',
            'durationchange',
            'emptied',
            'ended',
            'loadeddata',
            'loadedmetadata',
            'loadstart',
            'pause',
            'play',
            'playing',
            'progress',
            'ratechange',
            'seeked',
            'seeking',
            'stalled',
            'suspend',
            'timeupdate',
            'volumechange',
            'waiting',
        ] as $event) {
            $keyEvent = "on$event";
            $value = $$keyEvent ?? $this->getAttribute("@$event");
            $this->setAlpineEvent($event, $value);
        }

        return $this;
    }

    public function setAlpineDirectives(
        null|string|array $data = [],
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
    ): self
    {
        $this->setAlpineBindings($bind);
        $this->setAlpineEvents($on);
        $this->setAlpineData($data);

        foreach([
            'modelable',
            'effect',
            'ignore',
            'cloak',
            'model',
            'mask',
            'show',
            'init',
            'text',
            'html',
            'ref',
            'id',
        ] as $attribute) {
            $$attribute ??= $this->getAttribute("x-$attribute");

            if (is_null($$attribute)) {
                continue;
            }

            $this->setAttribute("x-$attribute", $$attribute);
        }

        return $this;
    }

    public function setAlpineTemplateDirectives(
        null|string $for = null,
        null|string $key = null,
        null|string $if = null,
    ): self
    {
        foreach([
            'for',
            'key',
            'if',
        ] as $attribute) {
            $$attribute ??= $this->getAttribute("x-$attribute");

            if (is_null($$attribute)) {
                continue;
            }

            $this->setAttribute("x-$attribute", $$attribute);
        }

        return $this;
    }

    private function setAlpineTransitionAttribute(string $key, string|bool $value): void
    {
        $this->attributes["x-transition:$key"] = $value;
    }

    private function getAlpineTransitionAttribute(string $key): mixed
    {
        return $this->getAttribute("x-transition:$key");
    }

    public function setAlpineTransitionDirectives(
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
    ): self
    {
        if (!is_null($transition)) {
            $this->setAlpineTransitionAttribute($transition, true);
        }

        foreach([
            'transitionEnterStart' => 'enter-start',
            'transitionEnterEnd'   => 'enter-end',
            'transitionEnter'      => 'enter',
            'transitionLeaveStart' => 'leave-start',
            'transitionLeaveEnd'   => 'leave-end',
            'transitionLeave'      => 'leave',
        ] as $attribute => $value) {
            $$attribute ??= $this->getAlpineTransitionAttribute($attribute);

            if (is_null($$attribute)) {
                continue;
            }

            $this->setAlpineTransitionAttribute($value, $$attribute);
        }

        foreach([
            'transitionOpacity'   => 'opacity',
            'transitionDuration'  => 'duration',
            'transitionDelay'     => 'delay',
            'transitionScale'     => 'scale',
        ] as $attribute => $value) {
            if (is_null($$attribute) || $$attribute === false) {
                continue;
            }
            $this->setAlpineTransitionAttribute(
                "{$value}.{$$attribute}", true,
            );
        }

        return $this;
    }

    private function setAlpineIntersectAttribute(string $key, string $value): void
    {
        $this->setAttribute("x-intersect:$key", $value);
    }

    private function getAlpineIntersectAttribute(string $key): mixed
    {
        return $this->getAttribute("x-intersect:$key");
    }

    public function setAlpineIntersectDirectives(
        null|string|array $intersect = null,
        null|string $intersectFull = null,
        null|string $intersectHalf = null,
        null|string $intersectOnce = null,
        null|string $intersectEnter = null,
        null|string $intersectLeave = null,
    ): self
    {
        if (is_null($intersect)) {
            return $this;
        }

        if (is_string($intersect)) {
            $this->setAttribute('x-intersect', $intersect);
        } elseif (is_array($intersect)) {
            foreach($intersect as $key => $value) {
                $this->setAlpineIntersectAttribute($key, $value);
            }
        } else {
            foreach([
                'intersectFull'  => 'full',
                'intersectHalf'  => 'half',
                'intersectOnce'  => 'once',
                'intersectEnter' => 'enter',
                'intersectLeave' => 'leave',
            ] as $attribute => $value) {
                $$attribute ??= $this->getAlpineIntersectAttribute($value);

                if (is_null($$attribute)) {
                    continue;
                }

                $this->setAlpineIntersectAttribute($value, $$attribute);
            }
        }

        return $this;
    }

    public function setAlpineBindAttribute(string $key, mixed $value): self
    {
        return $this->setAttribute("x-bind:$key", $value);
    }

    public function setAlpineBindings($value): self
    {
        $value ??= $this->getAttribute('x-bind');
        $value ??= $this->getAttribute('bind');
        $this->removeAttributes('x-bind', 'bind');

        if (!is_array($value)) {
            return $this;
        }

        foreach($value as $key => $value) {
            $this->setAlpineBindAttribute($key, $value);
        }

        return $this;
    }

    public function setAlpineData($value): self
    {
        $value ??= $this->getAttribute('x-data');
        $value ??= $this->getAttribute('data');
        $this->removeAttribute('data');

        if (is_null($value)) {
            return $this;
        }

        if (!is_string($value)) {
            $value = json_encode(
                flags: JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT,
                value: $value,
            );
        }

        return $this->setAttribute('x-data', $value);
    }

    public function __toString(): string
    {
        $this->setDefaultValues();
        return parent::__toString();
    }
}
