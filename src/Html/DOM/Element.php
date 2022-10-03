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

    public function setClass(null|string|array $value): self
    {
        $value ??= $this->getAttribute('class');

        if (is_null($value)) {
            return $this;
        }

        $value = $this->classToString($value);

        return $this->setAttribute('class', $value);
    }

    public function setStyle(null|string|array $value): self
    {
        $value ??= $this->getAttribute('style');

        if (is_null($value)) {
            return $this;
        }

        $value = $this->styleToString($value);

        return $this->setAttribute('style', $value);
    }

    public function setEventAttributes(
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
            'onafterprint',
            'onbeforeprint',
            'onbeforeunload',
            'onerror',
            'onhashchange',
            'onload',
            'onmessage',
            'onoffline',
            'ononline',
            'onpagehide',
            'onpageshow',
            'onpopstate',
            'onresize',
            'onstorage',
            'onunload',
            'onblur',
            'onchange',
            'oncontextmenu',
            'onfocus',
            'oninput',
            'oninvalid',
            'onreset',
            'onsearch',
            'onselect',
            'onsubmit',
            'onclick',
            'ondblclick',
            'onmousedown',
            'onmousemove',
            'onmouseout',
            'onmouseover',
            'onmouseup',
            'onmousewheel',
            'onwheel',
            'ondrag',
            'ondragend',
            'ondragenter',
            'ondragleave',
            'ondragover',
            'ondragstart',
            'ondrop',
            'onscroll',
            'oncopy',
            'oncut',
            'onpaste',
            'onkeydown',
            'onkeypress',
            'onkeyup',
            'onabort',
            'oncanplay',
            'oncanplaythrough',
            'oncuechange',
            'ondurationchange',
            'onemptied',
            'onended',
            'onloadeddata',
            'onloadedmetadata',
            'onloadstart',
            'onpause',
            'onplay',
            'onplaying',
            'onprogress',
            'onratechange',
            'onseeked',
            'onseeking',
            'onstalled',
            'onsuspend',
            'ontimeupdate',
            'onvolumechange',
            'onwaiting',
        ] as $event) {
            $$event ??= $this->getAttribute($event);
            $this->setAttribute($event, $$event);
        }

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
        if (is_null($value)) {
            return $this;
        }

        if (is_string($value) && $value === '') {
            return $this;
        }

        if (is_array($value) && count($value) === 0) {
            return $this;
        }

        if (!is_numeric($value) && !is_string($value) && !is_bool($value)) {
            $value = json_encode($value, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        }

        $this->attributes[$name] = $value;

        return $this;
    }

    public function getAttribute(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    protected function removeAttribute(string $name): void
    {
        unset($this->attributes[$name]);
    }

    protected function removeAttributes(string ...$names): void
    {
        foreach ($names as $name) {
            unset($this->attributes[$name]);
        }
    }

    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }

        return $this;
    }

    public function setEvent(string $name, string $value): self
    {
        $this->setAttribute("on$name", $value);
        return $this;
    }

    public function setEvents(array $events): self
    {
        foreach ($events as $name => $value) {
            $this->setEvent($name, $value);
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

        if (count($data) === 0) {
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

        if (empty($data)) {
            return '';
        }

        if (!is_array($data)) {
            return '';
        }

        if (count($data) === 0) {
            return '';
        }

        $data = array_filter($data, fn($value) => !empty($value));

        if (array_is_list($data)) {
            return join(' ', $data);
        }

        $keys  = array_keys($data);
        $attrs = array_map([$this, 'attributeToString'], $data, $keys);

        return join(' ', $attrs);
    }

    protected function attributeToString(mixed $value, string $key): string {
        if (is_null($value)) {
            return '';
        }

        if (is_bool($value)) {
            return $value ? "$key" : '';
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
