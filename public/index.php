<?php
//define('ROOT_DIR', __DIR__ . "/../");
include_once __DIR__ . "/../" . "config/config.php";
include ROOT_DIR . "engine/Autoload.php";


use \app\model\Products as Products;    //можно так
use app\engine\Db; //можно и так

spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . 'Controller';

if(class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\engine\Render());
    $controller->runAction($actionName);
}
$product = Products::getOne(7);
//var_dump($product);
$product->setName('Кольсоны');
//$product->setPrice(50);
$product->setDescription('теплые');
//var_dump($product);
$product->save();
//var_dump($controller);





