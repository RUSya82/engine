<?php
/**
 * Created by PhpStorm.
 * User: Salom
 * Date: 10.01.2019
 * Time: 18:47
 */

namespace app\controllers;

use app\model\Products;
use app\model\Order;

class OrderController extends Controller
{
    public function actionIndex(){
        echo "Index";
    }
    public function actionOrder(){
        $id = $_GET['id'];
        $order = Order::getOne($id);
        $idProducts = $order->getProducts();
        foreach ($idProducts as $key=>$value){
            $product = Products::getOne($key);
            //var_dump($product);
            echo $this->render('order',['product'=>$product,'count'=>$value]);
        }
    }
//    public function actionCart(){
//        $id = $_GET['id'];
//        $cart = Cart::getOne($id);
//        $idProducts = $cart->getProducts();
//        var_dump($idProducts);
//        foreach ($idProducts as $key=>$value){
//            $product = Products::getOne($key);
//            //var_dump($product);
//            echo $this->render('cart',['product'=>$product,'count'=>$value]);
//        }
//    }
}