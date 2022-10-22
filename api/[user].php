<?php

use Pext\Engine\Api;

return new class extends Api {
    function match($request): bool {
        return true;
    }

    function any() {
        return [];
    }
};