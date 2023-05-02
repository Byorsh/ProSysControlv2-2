<?php

require_once "modelos/usuario.php";
require_once 'modelos/regex.php';
//include('modeloUsuarios/regex.php');

class UsuarioControlador{
    
    private $modeloUsuario;

    public function __CONSTRUCT(){
        $this->modeloUsuario = new Usuario;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $usuarioSQL = new Usuario();
        if(isset($_GET['id'])){
            $usuarioSQL=$this->modeloUsuario->Obtener($_GET['id']);
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
            $usuarioSQL=$this->modeloUsuario->Obtener($_GET['id']);
        }
        else if(isset(($_SESSION['idusuario']))){
            $usuarioSQL=$this->modeloUsuario->Obtener(($_SESSION['idusuario']));
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/cambiarcontraseña.php";
        require_once "vistas/pie.php";
    }

    public function FormConsultar(){
        $titulo="Consultar";
        $usuarioSQL = new Usuario();
        if(isset($_GET['id'])){
            $usuarioSQL=$this->modeloUsuario->Obtener($_GET['id']);
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
                $this->modeloUsuario->Actualizar($usuarioSQL);
            }
            else{$this->modeloUsuario->Insertar($usuarioSQL);}
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

        $this->modeloUsuario->Actualizarcontraseña($usuarioSQL);
        
        header("location:?c=usuario");

    }
    
    public function Borrar(){
        $this->modeloUsuario->Eliminar($_GET["id"]);
        header("location:?c=usuario");
    }

}