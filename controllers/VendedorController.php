<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;


class VendedorController{

    public static function crear(Router $router){

        $vendedor = new Vendedor();

        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar 
            $errores = $vendedor->validar();

            if (empty($errores)) {
                // Guarda en la DB
               $vendedor->guardar();
            }

            // Guarda en la DB
            // $vendedor->guardar();
        }

        $router->render('vendedores/crear',[
            'vendedor'=> $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        echo 'Actualizar vendedor';
    }
}