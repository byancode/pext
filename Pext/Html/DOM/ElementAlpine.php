<?php

namespace Pext\Html\DOM;

class ElementAlpine extends Element
{
    public function setAlpineDirectives(
        null|string|array $data = [],
        null|array $bind = [],
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
        $this->setAttribute("x-bind:$key", $value);
        return $this;
    }

    public function setAlpineBindings($value): self
    {
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
        if (is_null($value)) {
            return $this;
        }

        if (!is_string($value)) {
            $value = json_encode(
                flags: JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT,
                value: $value,
            );
        }

        $this->setAttribute('x-data', $value);

        return $this;
    }

    public function __toString(): string
    {
        $this->setDefaultValues();
        return parent::__toString();
    }
}
