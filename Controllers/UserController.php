<?php

namespace Pext\Controllers;

class UserController
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello World',
        ]);
    }
}