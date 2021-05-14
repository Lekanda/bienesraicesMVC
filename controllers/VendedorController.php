<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;


class VendedorController{

    public static function crear(Router $router){

        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor();

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
        
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/bienesraicesMVC/public/index.php/admin');

        $vendedor = Vendedor::find($id);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            // Asignar los atributos
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
    
            // Validacion
            $errores = $vendedor->validar();
    
            // Comprobar que no haya errores en arreglo $errores. Comprueba que este VACIO (empty).
            if (empty($errores)) {
                
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

    }
    
    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
    
            // Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if ($id) {
                $tipo = $_POST['tipo'];
                // debuguear($_POST);
                // debuguear($tipo);
                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}