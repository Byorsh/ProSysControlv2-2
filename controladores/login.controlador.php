<?php

require_once "modelos/usuario.php";

class LoginControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Usuario();
    }

    public function Inicio(){
        require_once "vistas/login/login.php";
        require_once "vistas/pie.php";
    }
}