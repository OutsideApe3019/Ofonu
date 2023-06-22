<?php


include "autoload.php";

use App\Helpers\Routes;

Routes::check();

// class Testa {
//     public static array $items;

//     public static function add($name, $value) {
//         self::$items[$name] = $value;
//     }
// }

// class Test {
//     public function __construct($name, $value)
//     {
//         Testa::add($name, $value);
//     }
// }

// new Test('nome', 'valuta');
// new Test('$name', '$value');

// foreach(Testa::$items as $name => $value) {
//     echo "$name: $value<br>";
// }