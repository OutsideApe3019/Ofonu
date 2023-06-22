<?php

namespace App\Helpers;

use App\Helpers\Config;
use Exception;

class Helpers
{
    public static function e(mixed $text, bool $htmlspecialchars = true): string
    {
        if (!$htmlspecialchars) {
            print_r($text);
            return $text;
        }

        print_r(htmlspecialchars($text));

        return htmlspecialchars($text);
    }

    public static function abort(int $code, string $message = '')
    {
        if ($message == '') {
            $message = Config::abort()->get()->code($code);
        }

        http_response_code($code);

        return Page::view("errors/abort", [
            'code' => $code,
            'message' => $message,
        ]);
    }

    public static function config(string $key, string $default = ''): string|bool
    {
        $segments = explode('.', $key);
        $filename = array_shift($segments);
        $path = __DIR__ . '/../../config/' . $filename . '.php';

        if (!file_exists($path)) {
            throw new Exception("The config file \"$filename\" does not exist.");

            return false;
        }

        $config = include $path;

        foreach ($segments as $segment) {
            if (isset($config[$segment])) {
                $config = $config[$segment];
            } else {
                return $default;
            }
        }

        return $config;
    }
}
