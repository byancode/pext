<?php

namespace Pext\Engine;

use Pext\Html\DOM\Node;
use Swoole\Http\Request;
use Swoole\Http\Response;

class ComponentExample extends Component {
    function controller(Request $request) {
        return User::paginate(10);
    }

    public function render($response): Node {
        return Div(
            data: "{
                selectedId: {$response->get('0.id', 0)},
            }",
            effect: '$call.submit({ id: selectedId })',
            children: [
                Template(for: 'user in $response.users', children: [
                    Input(type: 'hidden', model: 'user.id'),
                    Input(type: 'text', model: 'user.name'),
                    Input(type: 'text', model: 'user.email'),
                ]),
                Button('Enviar ahora', onclick: '$call.submit({ name })'),
            ],
        );
    }

    function store(Request $request) {
        return [];
    }

    function destroy(Request $request) {
        return [];
    }

    function edit(Request $request) {
        return [];
    }
}