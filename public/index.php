<?php
define('ROOT_DIR', __DIR__ . "/../");
include ROOT_DIR . "engine/Autoload.php";

use \app\model\Products as Products;    //можно так
use app\engine\Db; //можно и так

spl_autoload_register([new \app\engine\Autoload(), 'loadClass']);


$product = new Products(null, 'dfhjfgk', 'Nifgjfgjke',650, 6,2);
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
$product->insert();
$category = new \app\model\Category(null, 'Санки');
$category->insert();
//$product->id = 9;
//$product->delete();


