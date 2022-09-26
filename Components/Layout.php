<?php

namespace Pext\Components;

class Layout extends FutureComponent {

    function render(Response $response)
    {
        return Html(
            head: Head(
                title: $response->title,
            ),
            body: Body(
                children: Div([
                    Div($_SERVER['HTTP_REQUEST_URL'] ?? '/', style: 'border: 1px solid red'),
                    Div('Hello World 1'),
                    Div('Hello World 2', text: '${__response.title}'),
                    Div('Hello World 3'),
                    Template(for: 'user in users', children: [
                        Div(text: 'Hello World ${user.name}'),
                    ]),
                    Div('Hello World 4'),
                    Div('Click me', onClick: 'alert("Hello World")'),
                ]),
                style: [
                    'background-color' => 'red',
                ],
            ),
        );
    }

    function index(Request $request) {
        return response([
            'message' => 'Hello World',
        ]);
    }

    function show(Request $request, $id) {
        $request->validate([
            'id' => 'required|integer',
        ]);

        return response([
            'message' => 'Hello World',
        ]);
    }
}