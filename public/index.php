<?php
define('ROOT_DIR', __DIR__ . "/../");
include ROOT_DIR . "engine/Autoload.php";

spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);

echo __DIR__;
$product = new \app\model\Products(new app\engine\Db());

var_dump($product);