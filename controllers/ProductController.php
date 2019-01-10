<?php

namespace app\controllers;


use app\model\Products;

class ProductController extends Controller
{

    public function actionIndex(){
        echo "Index";
    }
    public function actionCatalog(){
        $products = Products::getAll();
        //var_dump($products);
        foreach ($products as $value){
            $product = Products::getOne($value['id']);
            echo $this->render('card', ['product' => $product]);
            //var_dump($value);
        }
    }
    public function actionCard(){
        $id = $_GET['id'];
        //var_dump($id);
        $product = Products::getOne($id);
        //var_dump($product);
        echo $this->render('card', ['product' => $product]);
    }

}