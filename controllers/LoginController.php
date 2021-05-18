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
                $resultado = $auth->existeUsuario();
                if (!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el Password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        // Autenticar al usuario
                        $auth->autenticar();
                    } else {
                        // Password Incorrecto(Mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);
    }
    
    public static function logout(Router $router){
        session_start();
        // debuguear($_SESSION);
        
        $_SESSION = [];
        // debuguear($_SESSION);

        header('Location: /');

    }

}