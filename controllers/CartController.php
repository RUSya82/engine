<?php


namespace app\controllers;
use app\model\Cart;
use app\model\Products;

class CartController extends Controller
{
    public function actionIndex(){
        echo "Index";
    }
    public function actionCart(){
        $id = $_GET['id'];
        $cart = Cart::getOne($id);
        $idProducts = $cart->getProducts();
        var_dump($idProducts);
        foreach ($idProducts as $key=>$value){
            $product = Products::getOne($key);
            //var_dump($product);
            echo $this->render('cart',['product'=>$product,'count'=>$value]);
        }
    }
   // public function actionCard(){
//        $id = $_GET['id'];
//        //var_dump($id);
//        $product = Products::getOne($id);
//        //var_dump($product);
//        echo $this->render('card', ['product' => $product]);
//    }
}