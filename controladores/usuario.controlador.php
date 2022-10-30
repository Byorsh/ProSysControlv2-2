<?php

require_once "modelos/usuario.php";

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

    public function Guardar(){
        $usuarioSQL = new Usuario();

        $usuarioSQL->setId(intval($_POST['id']));
        $usuarioSQL->setRfc($_POST['rfc']);
        $usuarioSQL->setNombre($_POST['nombre']);
        $usuarioSQL->setApellido($_POST['apellido']);
        $usuarioSQL->setTelefono($_POST['telefono']);
        $usuarioSQL->setEmail($_POST['email']);
        $usuarioSQL->setUser($_POST['user']);
        $usuarioSQL->setContrasenia($_POST['contrasenia']);
        $usuarioSQL->setPrivilegio(intval($_POST['privilegio']));

        $usuarioSQL->getId() > 0 ?
        $this->modelo->Actualizar($usuarioSQL) :
        $this->modelo->Insertar($usuarioSQL);
        header("location:?c=usuario");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=usuario");
    }

}