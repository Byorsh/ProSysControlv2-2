<?php
/*require "database.php";
class Login{
    private $_db;
    public function_construct(){
        $this->pdo = Database::Conectar();
    }
    public function login($usuario,$password){
        $this->_db->Conectar();
        $resultadoQSL = $this->_db->conexion->prepare("")
        $r->execute();
        $this->_db->desconectar();
        if($this->fetch(PDO::FETCH_OBJ))
            return true;
        else
            return false;

    }
}
*/
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$server = "localhost";
$user = "root";
$password = "";
$database = "prosyscontrol";
$conexion=mysqli_connect($server,$user,$password,$database);
$consulta="SELECT*FROM usuario where user='$usuario'and contrasenia='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
    $_SESSION;
    header("location:./../../index.php");
}else{
    ?>
    <?php
    include("loguear.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);