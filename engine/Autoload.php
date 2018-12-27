<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className) {
            $fileName = ROOT_DIR . "{$className}.php";//делаем путь абсолютным
            $fileName = str_replace(["/app","\\"],['', '/'],$fileName);//убираем /app и меняем слеши
            //var_dump($fileName);
            if (file_exists($fileName)) {               //подключаем класс по путю
                include_once $fileName;
            }
    }
}