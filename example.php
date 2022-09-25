<?php

Html(
    head: Head(
        title: 'Title',
        children: [
            Meta(
                name: 'viewport',
                content: 'width=device-width, initial-scale=1.0',
            ),
            Stylesheet(
                href: assets('css/app.css'),
                integrity: 'sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z',
                crossorigin: 'anonymous',
            ),
            Script(
                src: assets('js/app.js'),
                integrity: 'sha384-7Uc9yD3gW3f8fVzYJ8fWU5wE9g1yYRn4Wn5nycdbP4cYuV+eT0zQ8ERdknLPMO3Y',
                crossorigin: 'anonymous',
            ),
            Element('dl', Div('Hola mundo'), class: 'container'),
        ]
    ),
    body: Body(
        children: ListView::future(
            initial: [],
            promise: [BinanceController::class, 'index'],
            builder: function ($context, $snapshot): array {
                return Href('Loading...', src: route('home'));
            },
        ),
        class: 'bg-gray-100',
    ),
);