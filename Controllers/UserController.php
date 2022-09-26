<?php

namespace Pext\Controllers;

class UserController
{
    public function index()
    {
        return response([
            'message' => 'Hello World',
        ]);
    }
}