<?php


namespace app\engine;


class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;
    private $method;


    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }


    private function parseRequest() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $this->requestString);
        $this->controllerName = $url[1];
        $this->actionName = $url[2];
        //var_dump($this->actionName);
        $this->params = $_REQUEST;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        var_dump($this->controllerName);
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        var_dump($this->actionName);
        return $this->actionName;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        var_dump($this->params);
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }




}