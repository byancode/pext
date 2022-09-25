<?php

namespace Pext\Layouts;

class App extends Component {
    public function build($context)
    {
        return Html(
            head: Head(
                title: 'Pext by Byancode',
            ),
            body: Body(
                children: Div([
                    Div($_SERVER['HTTP_REQUEST_URL'] ?? '/', style: 'border: 1px solid red'),
                    Div('Hello World 1'),
                    Div('Hello World 2'),
                    Div('Hello World 3'),
                    Div('Hello World 4'),
                ]),
                style: [
                    'background-color' => 'red',
                ],
            ),
        );
    }

    public function __toString(): string
    {
        return (string) $this->build();
    }
}