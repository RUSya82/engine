<?php
/**
 * Created by PhpStorm.
 * User: Salom
 * Date: 15.01.2019
 * Time: 0:37
 */

namespace app\engine;


use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }
    public function renderTemplate($template, $params = [])
    {
       // var_dump($params);
        echo $this->twig->render($template, $params);
    }
}
