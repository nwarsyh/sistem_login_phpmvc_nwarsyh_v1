<?php

class ControllerLogin{
    public function __construct() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

    public function authRequired() {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }
    public function view($Views, $getDataApp = [])
    {
        require_once VIEW_PATH . $Views . '.php';
    }
    public function model($Model)
    {
        $Controller = get_class($this);
        require_once MODEL_PATH . $Controller . '/' . $Model . '.php';
        return new $Model;
    }

}