<?php

namespace App\Helpers;

use Exception;

class Route
{
    public string $url;
    public string $method;
    public string $name = '';
    public Controller $controller;


    public function __construct(string $name, string $url, Controller $controller, string $method = 'GET')
    {
        $method = strtoupper($method);

        if ($method !== 'GET' && $method !== 'POST') {
            throw new Exception("Method \"$method\" not valid. Only GET or POST");

            return false;
        }

        $url = preg_replace('/ /', '', $url);
        $url = '/' . $url;
        $url .= '/';
        $url = preg_replace('/\/\/+/', '/', $url);
        $url = rtrim($url, '/');
        if($url == '') {
            $url .= '/';
        }

        $this->name = $name;
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;

        return true;
    }
}
