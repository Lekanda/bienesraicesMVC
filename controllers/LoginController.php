<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {
                // Verificar sí el usuario existe

                // Verificar el Password

                // Autenticar al usuario
            }
        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);
    }
    
    public static function logout(Router $router){
        echo 'Desde Logout';

    }

}
