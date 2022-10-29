<?php

require_once "modelos/usuario.php";

class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Usuario();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/inicio/principal.php";
        require_once "vistas/pie.php";
    }

    public function Salir(){
        require_once "vistas/login/salir.php";
        
    }
}