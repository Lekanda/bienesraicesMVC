<?php

namespace Model;

class Admin extends ActiveRecord{
    // Base de Datos. Asocia la tabla USUARIOS con el modelo Admin.php
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','email','password'];

    public $id;
    public $email;
    public $password;

    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar(){
        // Validar que no vaya vacio
        if (!$this->email) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un email valido";
        }
        if (!$this->password) {
            self::$errores[] = "Debes añadir un password valido";
        }
        return self::$errores;
    }

    public function existeUsuario(){
        // Revisar sí un usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $resultado = self::$db->query($query);

        // debuguear($resultado);
        // Por num_rows sabemos si hay resultado de la consulta  a la DB

        if (!$resultado->num_rows) {
            self::$errores[] = 'El Usuario no existe';
            return;
        } 
        return $resultado;
    }


    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        // debuguear($usuario);

        // Funcion de PHP que nos comprueba sí el password esta correcto.
        $autenticado = password_verify($this->password, $usuario->password);
        // debuguear($autenticado);
        if (!$autenticado) {
            self::$errores[] = 'El Password es incorrecto';
        }
        return $autenticado;
    }


    public function autenticar(){
        // Iniciar sesion
        session_start();
        // Llenar el arreglo de sesion
        $_SESSION['usuario'] = $this->email; // Email
        $_SESSION['login'] = true; // Login OK

        header('Location: /admin');
    }
}