<?php

use Pext\Components\Example;
use Pext\Engine\Page;
use Pext\Engine\Result;
use Pext\Html\DOM\Node;
use Swoole\Http\Request;

return new class extends Page {

    function match(Request $request): bool {
        return $request->check([
            'user' => 'required|int',
        ]);
    }

    function binanceScript() {
        return Script(type: 'text/javascript', content: '
            function binance() {
                return { message: "Hello world" }
            }
        ');
    }

    function controller(Request $request) {
        return [];
    }

    function render(Result $result): Node {
        return Html(
            title: 'Byancode',
            head: [
                Script(src: 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', defer: true),
                $this->binanceScript(),
            ],
            body: Body(
                children: Div(
                    data: [
                        'name' => 'bianca',
                    ],
                    class: 'container',
                    children: [
                        Text($this->request->server['request_uri'] ?? '/'),
                        Div(text: '`${name}`', style: [
                            'color'     => 'currentColor',
                            'padding'   => '3rem',
                            'font-size' => '2rem',
                        ]),
                        Div('Hello World 1', ondblclick: 'alert("Hello World 1")'),
                        Div(
                            text: '`Hola ${name}`',
                            style: 'text-transform: capitalize',
                            onclick: 'alert("Hello sWorld 2")'
                        ),
                        Div('Hello World 3'),
                        Input(
                            type: 'text',
                            model: 'name',
                            oninput: 'console.log(name)',
                        ),
                        Div('Hello World 4', onclick: 'alert(binance().message)'),
                        Div(html: div('Hello World 5')),
                        new Example(initial: ['name' => 'Bianca']),
                    ]
                ),
                style: 'background-color: #202124; color: #f2f2f2',
            ),
        );
    }
};