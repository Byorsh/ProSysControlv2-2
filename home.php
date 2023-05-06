<?php 
//En esta parte se inician los modelos
require_once('modelos/regex.php');
require_once "modelos/database.php";
$regex = new Regex;
session_start();
$camposporllenar=true;


if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
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
    
}
else{ include("index.php");$this->sweet_alerts("Sesion no iniciada");}




