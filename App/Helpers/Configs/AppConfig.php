<?php

namespace App\Helpers\Configs;

use App\Helpers\Helpers;

class AppConfig
{
    public function get($config): string
    {
        if ($config !== '') {
            return Helpers::config('app.' . $config);
        }
    }
}
