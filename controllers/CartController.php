<?php


namespace app\controllers;
use app\model\Cart;
use app\model\Products;

class CartController extends Controller
{
    public function actionIndex(){
        $id = $_GET['id'];
        $cart = Cart::getOne($id);
        $idProducts = $cart->getProducts();
        //var_dump($idProducts);
        foreach ($idProducts as $key=>$value){
            $product = Products::getOne($key);
            //var_dump($product);
            echo $this->render('cart',['product'=>$product,'count'=>$value]);
        }
    }
    public function actionCart(){
        $id = $_GET['id'];
        $cart = Cart::getOne($id);
        $idProducts = $cart->getProducts();
        //var_dump($idProducts);
        foreach ($idProducts as $key=>$value){
            $product = Products::getOne($key);
            //var_dump($product);
            echo $this->render('cart',['product'=>$product,'count'=>$value]);
        }
    }

}