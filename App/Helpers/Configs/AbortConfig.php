<?php

namespace App\Helpers\Configs;

use App\Helpers\Helpers;

class AbortConfig
{
    public function get($config = ''): AbortConfig|Helpers
    {
        if ($config !== '') {
            return Helpers::config('http.' . $config);
        }

        return new AbortConfig();
    }

    public function code($code): string
    {
        return Helpers::config('http.codes.' . $code);
    }
}
