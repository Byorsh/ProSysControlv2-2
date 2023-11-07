<?php
$usuario=$_POST['usuario'];
$password=$_POST['contraseña'];

include('modelos/database.php');
include('modelos/regex.php');
$regex = new Regex;
$usuario=$regex->limpiarCampo($usuario);
$password=$regex->limpiarCampo($password);

$consultaNombreDeUsuario = "SELECT contrasenia FROM usuario WHERE user = '$usuario';";
$resultado=mysqli_query($conexion, $consultaNombreDeUsuario);
$arregloContraseña = mysqli_fetch_array($resultado);
if($arregloContraseña != null){
    $verificacionContraseña=password_verify($password,$arregloContraseña[0]);
    if($verificacionContraseña){
        echo"amin";
        $consulta = "SELECT * FROM usuario WHERE user = '$usuario'";
        $resultado=mysqli_query($conexion, $consulta);
        $arr = mysqli_fetch_array($resultado);//arreglo de los atributos del usuario
    
        $filas=mysqli_num_rows($resultado);
        session_abort();
        session_start();
        $_SESSION['usuario']=$usuario;
        $_SESSION['idusuario']=$arr[0];
    
    
    
        if($filas){//verdadero si los datos coinciden
            switch($arr[8]){
                case 1:
                    $_SESSION['tipoUsuario']='Admin';//se guarda en el valor de la sesion
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
    }
    //en el caso que no encuentra
    else{
    
            include("index.php");
            $regex->sweet_alerts("Inicio de sesion error");
            
        }
}
else{
    include("index.php");
    $regex->sweet_alerts("Inicio de sesion error");
}

mysqli_free_result($resultado);
mysqli_close($conexion);