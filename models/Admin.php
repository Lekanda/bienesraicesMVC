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

    
}