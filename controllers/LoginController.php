<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'Autenticando';
        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);
    }
    
    public static function logout(Router $router){
        echo 'Desde Logout';

    }

}
