<?php

namespace app\controllers;


use app\model\Products;

class ProductController
{
    private $action;
    private $defaultAction = 'index';

    public function runAction($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        //var_dump($method);
        if(method_exists($this, $method)){
            $this->$method();
        }
        else{
            echo "404";
        }

    }
    public function actionIndex(){
        echo "Index";
    }
    public function actionCatalog(){
        echo "Catalog";
    }
    public function actionCard(){
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo "Card";
    }
    public function renderTemplate($template, $params = []){
        ob_start();
        $templatePath = TEMPLATES_DIR . $template . '.php';
        include $templatePath;
        return ob_get_clean();
    }
}