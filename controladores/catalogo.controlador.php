<?php

require_once "modelos/catalogo.php";

class CatalogoControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new catalogo;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/catalogo/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $clienteSQL = new Cliente();
        if(isset($_GET['id'])){
            $clienteSQL=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/catalogo/acciones_Catalogo.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $clienteSQL = new Catalogo();

        $clienteSQL->setId(intval($_POST['idClientes']));
        $clienteSQL->setRfc($_POST['rfc']);
        $clienteSQL->setNombre($_POST['nombreCliente']);
        $clienteSQL->setApellidoP($_POST['apellidoP']);
        $clienteSQL->setApellidoM($_POST['apellidoM']);
        $clienteSQL->setNombreEmpresa($_POST['nombreEmpresa']);
        $clienteSQL->setTelefono($_POST['telefono']);
        $clienteSQL->setEmail($_POST['email']);
        $clienteSQL->setDomicilio($_POST['domicilio']);

        $clienteSQL->getId() > 0 ?
        $this->modelo->Actualizar($clienteSQL) :
        $this->modelo->Insertar($clienteSQL);
        header("location:?c=catalogo");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=catalogo");
    }

}