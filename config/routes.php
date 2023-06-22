<?php

use App\Helpers\Routes;
use App\Helpers\Route;
use App\Helpers\Controller;

Routes::add(new Route('home', '/', new Controller('HomeController', 'index')));
