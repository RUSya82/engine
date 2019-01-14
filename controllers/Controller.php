<?php

namespace app\controllers;


use app\interfaces\IRenderer;

class Controller implements IRenderer
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        var_dump($method);
        if(method_exists($this, $method)){
            $this->$method();
        }
        else{
            echo "404";
        }

    }
    public function render($template, $params = []) {
        if ($this->useLayout) {
            //var_dump($params);
            //var_dump("layouts/{$this->layout}.php");
            return $this->renderTemplate("layouts/{$this->layout}", ['content' => $this->renderTemplate($template, $params)]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }

//    public function renderTemplate($template, $params = []) {
//        ob_start();
//        extract($params);
//        $templatePath = TEMPLATES_DIR . $template . ".php";
//        include $templatePath;
//        return ob_get_clean();
//    }

}