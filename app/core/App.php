<?php


class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params;

    /**
     * __construct
     * load the controller and the method
     * @return void
     */
    public function __construct()
    {
        $url = $this->parseURL();

        //check if the file exists
        if (file_exists("../app/controllers/" . strtolower($url[0]) . ".php")) {
            $this->controller = ($url[0]);
            unset($url[0]);
        } 
        else 
        {
            $this->controller = "Page404";
        }
        require("../app/controllers/" . $this->controller . ".php");
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            $url[1] = strtolower($url[1]);
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = (count($url) > 0) ? $url : ["index"];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * parseURL
     * @return array
     */
    private function parseURL()
    {
        $url = $_GET['url'] ?? "Home";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }
}