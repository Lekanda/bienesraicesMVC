<?php

    namespace MVC;

    class Router{

        public $rutasGET = [];
        public $rutasPOST = [];
        
        // Metodo que toma la urlactual y la funcion asociada.
        public function get($url, $fn){
            $this->rutasGET[$url] = $fn;
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
            }
            if($fn){
                // La url existe y hay una funcion asociada
                // debuguear($fn);
                call_user_func($fn, $this); // es una funcion que llama a otra funcion cuando no sabemos como se llama. P ejm. No se sabe a que url ira.
            } else {
                echo 'Pagina no encontrada';
            }
        }
    }