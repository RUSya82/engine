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
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}
//var_dump($controller);



//пробуем вытащить из БД сразу в объект
//$product = (new Products())->getOne(6);
//var_dump($product);
//$order = (new \app\model\Order())->getOne(2);
//var_dump($order);
//$cart = (new \app\model\Cart()) -> getOne(2);
//var_dump($cart);
//$category = (new \app\model\Category()) ->getOne(2);
//var_dump($category);

//$product = new Products(null, 'lhijn', 'lknjbbnj',650, 6,2);
//
//$product->insert();

//$product = Products::getOne(61);
//var_dump($product);
//var_dump(get_class_methods($product));
//$user = new \app\model\Users(null,'fhfhfh','656585','toopack');
//$user->insert();
//var_dump($user);
//$i = 0;
//foreach ($product as $key=>$value){
//    //if($key !== 'db')
//        echo "{$key} => {$value}<br>";
//        $i++;
//        if($i >= $product->tableFieldsCouns)
//            break;
//}
//echo $product->getFields() . "<br>";
//echo $product->getValues();
//$product->update();
//$category = new \app\model\Category(null, 'Санки');
//$category->insert();
//$product->setId(59);
//$product->delete();
//$cart = new \app\model\Cart(null,['35'=>3,'45'=>4,'66'=>5],null,12,'2018-12-27');
////$cart->setIdUser(35);
////$cart->setProducts(['15'=>2,'65'=>2]);
////var_dump($cart);
//$cart->insert();
//$order = new \app\model\Order(null,['35'=>3,'45'=>4,'66'=>5],null,12,'2018-12-27','sefgweg');
//$order->insert();


