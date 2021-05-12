<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{

    public static function index(Router $router){

        $propiedades = Propiedad::all();
        // Muestra mensaje condicional, si no hay lo pone como null
        $resultado = $_GET['resultado'] ?? null;


        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }
    
    public static function crear(Router $router){
        
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // El constructor de la clase es un Arreglo y $_POST tambien por eso se puede pasar asi.
            $propiedad = new Propiedad($_POST['propiedad']);
    
            // debuguear($propiedad);
            // debuguear($_FILES['propiedad']);
            
            /**Subida de Archivos**/
            // Crear una carpeta
            $carpetaImagenes = '../public/imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
            // debuguear($carpetaImagenes);
    
            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            // Setear la imagen 
            // Realiza un resize a la imagen con Intervention Image.
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }

            //  debuguear($_SERVER["DOCUMENT_ROOT"]);
    
            // Validar 
            $errores = $propiedad->validar();
            // debuguear($propiedad);
    
            // Comprobar que no haya errores en arreglo $errores. Comprueba que este VACIO (empty).
            if (empty($errores)) {
                // Crear la carpeta imagenes
                if(!is_dir(CARPETAS_IMAGENES)){
                    mkdir(CARPETAS_IMAGENES);
                }
    
                // Guarda la imagen en el servidor
                $image->save(CARPETAS_IMAGENES . $nombreImagen);
    
                // Guarda en la DB
               $propiedad->guardar();
    
            }
        }

        $router->render('propiedades/crear',[
            'propiedad'=> $propiedad,
            'vendedores'=> $vendedores,
            'errores' => $errores
        ]);

    }
    
    public static function actualizar(){
        echo "actualizar propiedad";
    }
}