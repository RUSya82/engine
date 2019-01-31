<?php
//define('ROOT_DIR', __DIR__ . "/../");
include_once __DIR__ . "/../" . "config/config.php";
include ROOT_DIR . "engine/Autoload.php";
require_once ROOT_DIR . "vendor/autoload.php";

use \app\model\Products as Products;    //можно так
use app\engine\Db; //можно и так
use app\engine\Request;
spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);

$request = new Request();
var_dump($request);
$controllerName = $request->getControllerName()?: 'product';
$actionName = $request->getActionName();
//$controllerName = $_GET['c'] ?: 'product';
//$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . 'Controller';
//$loader = new Twig_Loader_Filesystem(ROOT_DIR . 'templates');

if(class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\engine\Render());
    //$controller = new $controllerClass(new \app\engine\TwigRenderer());
    $controller->runAction($actionName);
}
echo "<br><a href='/product/catalog/'>Каталог</a><br>";
echo "<a href='/product/card/?id=7'>Карточка товара</a><br>";
echo "<a href='/cart/cart/?id=2'>Корзина</a><br>";
$product = Products::getOne(7);
//var_dump($product);
$product->setName('Кольсоны');
//$product->setPrice(50);
$product->setDescription('gehndkdfg');
//var_dump($product);
$product->save();
//var_dump($controller);
$cart
?>





