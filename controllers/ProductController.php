<?php

namespace app\controllers;


use app\model\Products;

class ProductController extends Controller
{

    public function actionIndex(){
        echo "Index";
    }
    public function actionCatalog(){
        echo "Catalog";
    }
    public function actionCard(){
        $id = $_GET['id'];
        //var_dump($id);
        $product = Products::getOne($id);
        //var_dump($product);
        echo $this->render('card', ['product' => $product]);
    }

}