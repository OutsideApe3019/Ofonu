<?php

namespace App\Helpers;

use Exception;

class Controller
{
    public string $name;
    public string $action;

    public function __construct(string $name, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    public function call(): bool
    {

        if (!file_exists(__DIR__ . '/../Controllers/' . $this->name . '.php')) {
            throw new Exception("The Controller \"$this->name\" does not exist.");
            return false;
        }

        call_user_func("\App\Controllers\\" . $this->name . "::" . $this->action);
        return true;
    }
}
