<?php
$usuario=$_POST['usuario'];
$password=$_POST['contraseña'];

session_start();
$_SESSION['usuario'] = $usuario;

include('modelos/database.php');
include('modelos/regex.php');
$regex = new Regex;
$usuario=$regex->limpiarCampo($usuario);
$password=$regex->limpiarCampo($password);

$consulta = "SELECT * FROM usuario WHERE user = '$usuario' and contrasenia ='$password'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
session_abort();
session_start();
$_SESSION['usuario']=$usuario;

if($filas){
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
            if($usuario==null){
                $regex->sweet_alerts("faltaUsuario");
            }
            if(($password==null)){
                $regex->sweet_alerts("faltaContraseña");
            }
        }
    }
    else{
        ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
    include("index.php");
    }
}
mysqli_free_result($resultado);
mysqli_close($conexion);