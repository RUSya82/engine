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
    protected $loader;
    public function renderTemplate($template, $params = []) {
       // $loader = new Twig_Loader_Filesystem(ROOT_DIR . 'templates');

    }
    public function __construct($loader)
    {
        $this->loader = $loader;
    }

}
