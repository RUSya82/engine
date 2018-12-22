<?php

namespace app\engine;

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