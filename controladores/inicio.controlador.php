<?php

require_once "modelos/usuario.php";

class InicioControlador{
    private $modeloUsuario;

    public function __CONSTRUCT(){
        $this->modeloUsuario = new Usuario();
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        //$_POST['equiposAsignados']=$this->modeloUsuario->CantidadDeEquiposAsignados($_SESSION['id']);
        require_once "vistas/inicio/principal.php";
        require_once "vistas/pie.php";
    }

    public function Salir(){
        require_once "vistas/login/salir.php";
        
    }
}