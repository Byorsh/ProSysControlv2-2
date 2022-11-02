<?php
$usuario=$_POST['usuario'];
$password=$_POST['contraseña'];

include('modelos/database.php');
include('modelos/regex.php');
$regex = new Regex;
$usuario=$regex->limpiarCampo($usuario);
$password=$regex->limpiarCampo($password);

$consulta = "SELECT * FROM usuario WHERE user = '$usuario' and contrasenia ='$password'";
$resultado=mysqli_query($conexion, $consulta);
$arr = mysqli_fetch_array($resultado);

$filas=mysqli_num_rows($resultado);
session_abort();
session_start();
$_SESSION['usuario']=$usuario;



if($filas){
    switch($arr[8]){
        case 1:
            $_SESSION['tipoUsuario']='Admin';
            break;
        case 3:
            $_SESSION['tipoUsuario']='Secretario';
            break;
        case 2:
            $_SESSION['tipoUsuario']='Tecnico';
            break;

    
    }
    $_SESSION;    
    header("location:home.php");
}
else{
    if($usuario==null || $password==null){
        
        include("index.php");
        if($usuario==null && $password==null){
            $regex->sweet_alerts("faltan campos");
        }
        else{
            if($usuario==null && $password != null){
                $regex->sweet_alerts("faltaUsuario");
            }
            if(($password==null && $usuario != null)){
                $regex->sweet_alerts("faltaContraseña");
            }
        }
    }
    else{
        include("index.php");
        $regex->sweet_alerts("Inicio de sesion error");
        
    }
}
mysqli_free_result($resultado);
mysqli_close($conexion);