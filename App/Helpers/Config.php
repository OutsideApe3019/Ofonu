<?php

namespace App\Helpers;

use App\Helpers\Configs\AbortConfig;
use App\Helpers\Configs\AppConfig;

class Config
{
    public static function abort(): AbortConfig
    {
        return new AbortConfig();
    }

    public static function app(): AppConfig
    {
        return new AppConfig();
    }

    public static function get($config): string
    {
        return Helpers::config($config);
    }
}
