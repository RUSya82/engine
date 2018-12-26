<?php
define('ROOT_DIR', __DIR__ . "/../");
include ROOT_DIR . "engine/Autoload.php";

use \app\model\Products as Products;    //можно так
use app\engine\Db; //можно и так

spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);


$product = new Products();
//$product->id = 9;
//$product->delete();
//var_dump($product);//viev product
//var_dump($product->getAll());

