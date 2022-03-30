<?php

class App
{
    //controller default
    protected $controller = 'Login';
    //method default
    protected $method = 'index';
    //parameter yang akan dikirimkan
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if (!empty($url)) {
            //cek controller
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //cek method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //cek parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //jalankan controller & method, serta kirimkan params ke method tujuan jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
