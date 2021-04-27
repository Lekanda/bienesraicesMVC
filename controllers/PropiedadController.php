<?php

namespace Controllers;
use MVC\Router;

class PropiedadController{

    public static function index(Router $router){
        $router->render('propiedades/admin', [
            'mensaje' => 1,
            'propiedades' => [1,2,3]
        ]);
    }
    
    public static function crear(){
        echo "Crear propiedad";
    }
    
    public static function actualizar(){
        echo "actualizar propiedad";
    }
}