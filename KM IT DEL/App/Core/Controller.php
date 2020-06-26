<?php

class Controller
{
    public function view($view, $data = array())
    {
        require_once './App/Views/' . $view . '.php';
    }


    public function model($model)
    {
        require_once './App/Model/' . $model . '.php';
        return new $model;
    }
}
