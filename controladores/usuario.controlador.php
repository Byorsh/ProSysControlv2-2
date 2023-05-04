<?php

require_once "modelos/usuario.php";
require_once 'modelos/regex.php';
//include('modeloUsuarios/regex.php');

class UsuarioControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Usuario;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/index.php";
        require_once "vistas/pie.php";
    }

    public function PaginarN(){
        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/index.php";
        require_once "vistas/pie.php";
    }
    public function BuscaryPaginar(){

        require_once "vistas/encabezado.php";
        $_GET["q"]=$_POST['campo'];
        require_once "vistas/usuarioindex.php";
        require_once "vistas/pie.php";

        
        
    }
    public function Buscar(){

        require_once "vistas/encabezado.php";
        $_GET["q"]=$_POST['campo'];
        require_once "vistas/usuario/index.php";
        require_once "vistas/pie.php";

        
    }

    public function FormCrear(){
        $titulo="Registrar";
        $usuarioSQL = new Usuario();
        if(isset($_GET['id'])){
            $usuarioSQL=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/crear_Usuario.php";
        require_once "vistas/pie.php";
    }
    public function FormCambiarContraseña(){
        $titulo="Cambiarcontraseña";
        $usuarioSQL = new Usuario();
        if(isset($_GET['id'])){
            $usuarioSQL=$this->modelo->Obtener($_GET['id']);
        }
        else if(isset(($_SESSION['idusuario']))){
            $usuarioSQL=$this->modelo->Obtener(($_SESSION['idusuario']));
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/cambiarcontraseña.php";
        require_once "vistas/pie.php";
    }

    public function FormConsultar(){
        $titulo="Consultar";
        $usuarioSQL = new Usuario();
        if(isset($_GET['id'])){
            $usuarioSQL=$this->modelo->Obtener($_GET['id']);
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/consultar_Usuario.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $usuarioSQL = new Usuario();
        $contraseñaEncriptada = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);

        $usuarioSQL->setId(intval($_POST['id']));
        $usuarioSQL->setRfc($_POST['rfc']);
        $usuarioSQL->setNombre($_POST['nombre']);
        $usuarioSQL->setApellido($_POST['apellido']);
        $usuarioSQL->setTelefono($_POST['telefono']);
        $usuarioSQL->setEmail($_POST['email']);
        $usuarioSQL->setUser($_POST['user']);
        $usuarioSQL->setContrasenia($contraseñaEncriptada);
        $usuarioSQL->setPrivilegio(intval($_POST['privilegio']));

        if($usuarioSQL->verificarAtributos($usuarioSQL)){
            
            if($usuarioSQL->getId() > 0){
                $this->modelo->Actualizar($usuarioSQL);
            }
            else{$this->modelo->Insertar($usuarioSQL);}
            //$usuarioSQL->getId() > 0 ?
            
            header("location:?c=usuario");

        }
        else {
            header("location:?c=usuario&a=FormCrear");
        }

    }
    public function Guardarcontraseña(){
        $usuarioSQL = new Usuario();
        $usuarioSQL->setId(intval($_POST['id']));
        $contraseñaEncriptada = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
        $usuarioSQL->setContrasenia($contraseñaEncriptada);

        $this->modelo->Actualizarcontraseña($usuarioSQL);
        
        header("location:?c=usuario");

    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=usuario");
    }

}