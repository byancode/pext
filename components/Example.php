<?php

namespace Pext\Components;

use Pext\Engine\Component;
use Swoole\Http\Request;
use Pext\Html\DOM\Node;
use Throwable;

class Example extends Component {
    function onLoading(): ?Node {
        return null;
    }

    function onError(Throwable $e): ?Node {
        return null;
    }

    function onEmpty(): ?Node {
        return null;
    }

    function render($state): Node {
        return Form(
            action: $this->route('remove', ['user' => 1]),
            class: ['hola', 'mundo'],
            children: [
                Template(for: 'user in $state.data', children: [
                    Input(type: 'hidden', model: 'user.id'),
                    Input(type: 'text', model: 'user.name'),
                    Input(type: 'text', model: 'user.email'),
                ]),
                Button('Enviar ahora', type: 'submit', onclick: '$$remove(user.id)'),
            ],
        );
    }

    function state(Request $request) {
        return User::paginate(10);
    }

    function store(Request $request, User $user) {
        $user->save();
    }

    function remove(Request $request, User $user) {
        $user->delete();
    }

    function edit(Request $request) {
        return [];
    }
}