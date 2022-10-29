<?php
session_start();
require "modelos/login.php";

class LoginControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Login();
    }

    public function Inicio(){
        require_once "vistas/login/login.php";
    }
    public function index(){
        if(isset($_SESSION['login']))
        header('location:'.urlsite)
    }
    public function validar(){
        $usuario=$_POST['usuario'];
        $contraseña-$_POST['contraseña'];
        session_start();
        $_SESSION['usuario']=$usuario;

        $conexion=mysqli_connect($server,$user,$password,$database);
        $conexion=mysqli_connect();

    }
    /*
    public function index(){
        if(isset($_SESSION['login']))
            header('location:'.urlsite);
        require "vistas/login/login.php";
    }
    public function login(){
        $_modelo = new Login();
        $_usuario = trim($_POST['txtemail']);
        $_contraseña = trim($_POST['tstpassword']);

        $_resultado = $_login = $_modelo->login($_usuario,$_contraseña);
        if($_resultado){
            $_SESSION['login'] = $_usuario;
            header('location:'.urlsite);
        }else{
            header('location:'.urlsite."?msg=No coinciden las credenciales");

        }
    }   
    */
}