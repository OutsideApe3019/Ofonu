<?php

namespace App\Helpers;

use Exception;

class Session {
    public static function set(string $key, mixed $value): bool {
        if(session_status() == 1) {
            session_start();
        }

        $_SESSION[$key] = $value;

        return true;
    }

    public static function remove(string $key): bool {
        if(session_status() == 1) {
            session_start();
        }

        if(!isset($_SESSION[$key])) {
            throw new Exception("The session variable \"$key\" does not exist.");

            return false;
        }

        unset($_SESSION[$key]);

        return true;
    }

    public static function get(string $key): mixed {
        if(session_status() == 1) {
            session_start();
        }

        if(!isset($_SESSION[$key])) {
            throw new Exception("The session variable \"$key\" does not exist.");

            return false;
        }

        $return = $_SESSION[$key];

        return $return;
    }

    public static function delete(): bool {
        if(session_status() == 1) {
            session_start();
        }

        $_SESSION = [];

        session_destroy();

        return true;
    }
}
