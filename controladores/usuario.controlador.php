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
        $u = new Usuario();
        if(isset($_GET['id'])){
            $u=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/usuario/crear_Usuario.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $u = new Usuario();

        $u->setId(intval($_POST['id']));
        $u->setRfc($_POST['rfc']);
        $u->setNombre($_POST['nombre']);
        $u->setApellido($_POST['apellido']);
        $u->setTelefono($_POST['telefono']);
        $u->setEmail($_POST['email']);
        $u->setUser($_POST['user']);
        $u->setContrasenia($_POST['contrasenia']);
        $u->setPrivilegio(intval($_POST['privilegio']));

        $u->getId() > 0 ?
        $this->modelo->Actualizar($u) :
        $this->modelo->Insertar($u);
        header("location:?c=usuario");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=usuario");
    }

}