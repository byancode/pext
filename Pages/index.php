<?php

return new Layout(
    head: Head(
        title: 'Pext by Byancode',
    ),
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
            Future::render(
                promise: [UserController::class, 'index'],
                builder: function($context, $snapshot) {
                    $children = Div(style: 'border: 1px solid blue');
                    foreach ($snapshot->data as $user) {
                        $children->append(
                            new UserItem($user),
                        );
                    }

                    return [
                        $children,
                        Div('Ver mas resultados', onclick: 'nextPage()'),
                    ];
                },
                loading: Div('Loading...'),
                empty: Div('No hay resultados'),
            ),
            Div('Hello World 2'),
            Div('Hello World 3'),
            Div(
                data: '{
                    age: 30,
                    name: "Byancode,
                    sfgjhd() {
                        console.log("sfgjhd");
                    },
                    get ageInDays() {
                        return this.age * 365;
                    },
                }',
                children: [
                    Div('Hello World 4', ondblclick: 'shown = !shown'),
                    Div('Hello World 5', show: 'shown', click: 'once: sfgjhd()'),
                ],
            ),
        ]),
        style: '
            background-color: red;
            color: white;
        ',
    ),
);