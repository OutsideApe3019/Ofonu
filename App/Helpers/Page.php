<?php

namespace App\Helpers;

use Exception;

class Page
{
    public static function view(string $view, array $vars = []): bool
    {
        foreach ($vars as $var => $value) {
            $$var = $value;
        }

        if (!file_exists(__DIR__ . '/../../views/' . $view . '.php')) {
            throw new Exception("The view \"$view\" does not exist.");

            return false;
        }

        $file = fopen(__DIR__ . '/../../views/' . $view . '.php', "r");
        $f = fread($file, filesize(__DIR__ . '/../../views/' . $view . '.php'));

        $f = preg_replace_callback('/-include\(\'(.*?)\'\)/', function ($matches) {
            $includedFile = file_get_contents(__DIR__ . '/../../views/' . $matches[1] . '.php');
            return $includedFile;
        }, $f);
        
        $f = preg_replace('/-if\(\s*(.*?)\s*\)/', '<?php if($1) { ?>', $f);
        $f = preg_replace('/-elseif\(\s*(.*?)\s*\)/', '<?php } else if($1) { ?>', $f);
        $f = preg_replace('/-else/', '<?php } else { ?>', $f);
        $f = preg_replace('/-end/', '<?php } ?>', $f);
        $f = preg_replace('/#{{\s*(.*?)\s*}}/s', '<?php /* $1 */ ?>', $f);
        $f = preg_replace('/!{{\s*(.*?)\s*}}/s', '<?php \App\Helpers\Helpers::e($1, false); ?>', $f);
        $f = preg_replace('/{{\s*(.*?)\s*}}/s', '<?php \App\Helpers\Helpers::e($1); ?>', $f);

        ob_clean();
        ob_start();
        eval("?>$f");
        $result = ob_get_clean();

        echo $result;

        return true;
    }
}
