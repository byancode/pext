<?php

return new Pext\Layouts\App(
    drawer: Div(
        style: [
            'background-color' => 'red',
        ],
        children: [
            Div('Hello World 1'),
            Div('Hello World 2'),
            Div('Hello World 3'),
            Div('Hello World 4'),
        ],
    ),
    body: Body(
        children: Div([
            Div($_SERVER['HTTP_REQUEST_URL'] ?? '/', style: 'border: 1px solid red'),
            # los futuros crean un Alpine data con functiones y variables que son generados al compilar el elemento futuro y agregado en el contexto para ser llamado desde el snapshot
            Div::future(
                initial: [],
                promise: route('users.index'),
                builder: function($context, $snapshot) {
                    return [
                        Div(text: 'Hello World ${id}'),
                        Div('Ver mas resultados', onclick: $snapshot->nextPage()),
                    ];
                },
            ),
            Div('Hello World 2'),
            Div('Hello World 3'),
            Div('Hello World 4'),
        ]),
        style: [
            'background-color' => 'red',
        ],
    ),
);