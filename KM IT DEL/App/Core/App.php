<?php

class App
{
    // Default controller , method, and parameter
    protected $controller = 'Home';
    protected $method = 'index';
    protected $parameter = array();

    // auto function 
    public function __construct()
    {
        // Parse route
        $route = $this->parseRoute();


        // Check and Change controller
        if (file_exists('App/Controller/' . $route['0'] . '.php')) {
            $this->controller = $route['0'];
            unset($route['0']);
        }

        // Make Controller Object so we can access function in their class
        include 'App/Controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Check and Change Method or Function
        if (isset($route['1'])) {
            if (method_exists($this->controller, $route['1'])) {
                $this->method = $route['1'];
                unset($route['1']);
            }
        }

        // Check and Change Parameter
        if (!empty($route)) {
            $this->parameter = array_values($route);
        }

        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    // Function to get Route
    public function parseRoute()
    {
        if (isset($_GET['route'])) {
            $route = rtrim($_GET['route'], '/');
            $route = filter_var($route, FILTER_SANITIZE_URL);
            $route = explode('/', $route);
            return $route;
        }
    }
}
