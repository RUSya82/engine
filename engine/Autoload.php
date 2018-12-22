<?php

namespace app\engine;

//define('ROOT_DIR', __DIR__ . "/../");

class Autoload
{
    public function loadClass($className) {
            $fileName = ROOT_DIR . "{$className}.php";
            $fileName = str_replace(["/app","\\"],['', '/'],$fileName);
            var_dump($fileName);
            if (file_exists($fileName)) {
                include_once $fileName;
            }
    }
}