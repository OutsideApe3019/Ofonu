<?php

namespace App\Controllers;

use App\Helpers\Page;
use App\Helpers\Config;

class HomeController
{
    public static function index()
    {
        $title = "Home";
        $text = "Welcome to the $title page!";

        return Page::view('home', [
            'title' => $title,
            'text' => $text,
            'app' => Config::app()->get('name'),
        ]);
    }
}
