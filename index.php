<?php 
//aqui se intenta guardar los datos del usuario esta bien porque no da error
//pero sale mocho en la esquinita XD

require_once "modelos/database.php";
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario))
    location("location: vistas/login/login.php");
    
else{
    echo"<div>
    <h1>BIENVENIDO $usuario </h1>
    <h1><a href='vistas/login/salir.php'>SALIR</a><h1>
    </div>";


}


if(!isset($_GET['c'])){
    require_once "controladores/inicio.controlador.php";
    $controlador = new InicioControlador();
    call_user_func(array($controlador, "Inicio"));
}else{
    $controlador = $_GET['c'];
    require_once "controladores/$controlador.controlador.php";
    $controlador = ucwords($controlador)."Controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador, $accion));
}