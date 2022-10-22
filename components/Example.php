<?php

namespace Pext\Components;

use Pext\Engine\Component;
use Pext\Html\DOM\Node;
use Swoole\Http\Request;

class Example extends Component {

    function render($state): Node {
        return Div(
            data: [
                'selectedId' => $state->get('0.id', 0),
            ],
            effect: '$$remove({ id: selectedId })',
            children: [
                Template(for: 'user in $state.data', children: [
                    Input(type: 'hidden', model: 'user.id'),
                    Input(type: 'text', model: 'user.name'),
                    Input(type: 'text', model: 'user.email'),
                ]),
                Button('Enviar ahora', onclick: '$$submit({ name })'),
            ],
        );
    }

    function state(Request $request) {
        return User::paginate(10);
    }

    function store(Request $request) {
        return [];
    }

    function remove(Request $request) {
        return [];
    }

    function edit(Request $request) {
        return [];
    }
}