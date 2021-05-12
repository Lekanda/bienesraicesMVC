<?php

    namespace MVC;

    class Router{

        public $rutasGET = [];
        public $rutasPOST = [];
        
        // Metodo que toma la urlactual y la funcion asociada.
        public function get($url, $fn){
            $this->rutasGET[$url] = $fn;
        }

        // Metodo POST que toma la urlactual y la funcion asociada.
        public function post($url, $fn){
            $this->rutasPOST[$url] = $fn;
        }



        public function comprobarRutas(){
            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            // debuguear($urlActual);
            // debuguear($metodo);

            if ($metodo === 'GET') {
                // echo 'Metodo GET...';
                // debuguear($this->rutasGET);

                $fn = $this->rutasGET[$urlActual] ?? null;
                // debuguear($this->rutasGET[$urlActual]);
                // debuguear($this->rutasGET);
                // debuguear($fn);
            } else {
                // debuguear($_POST);
                // debuguear($this);
                $fn = $this->rutasPOST[$urlActual] ?? null;
            }




            if($fn){
                // La url existe y hay una funcion asociada
                // debuguear($fn);
                // debuguear($this);
                call_user_func($fn, $this); // es una funcion que llama a otra funcion cuando no sabemos como se llama. P ejm. No se sabe a que url ira.
            } else {
                echo 'Pagina no encontrada';
            }
        }

        // Muestra una vista
        public function render ($view, $datos =[]){
            // debuguear($datos);

            foreach($datos as $key => $value){
                $$key = $value;// $$key: key es la llave y value es el valor.$$ Variable de variable. No sabemos que variable ira. Crea variables en la vista
            }

            ob_start(); // Inicia un almacenamiento en memoria del valor. Temporal
            include_once __DIR__ . "/views/$view.php";
            $contenido = ob_get_clean();// Liimpia los datos en memoria despues de cogerlos.
            include_once __DIR__ . "/views/layout.php";
        }





    }