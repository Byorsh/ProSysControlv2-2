<?php

require_once "modelos/cliente.php";

class ClienteControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Cliente;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/cliente/index.php";
        require_once "vistas/pie.php";
    }

    public function PaginarN(){
        require_once "vistas/encabezado.php";
        require_once "vistas/cliente/index.php";
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
        require_once "vistas/cliente/acciones_Cliente.php";
        require_once "vistas/pie.php";
    }

    public function FormConsultar(){
        $titulo="Consultar";
        $clienteSQL = new Cliente();
        if(isset($_GET['id'])){
            $clienteSQL=$this->modelo->Obtener($_GET['id']);
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/cliente/consulta_Cliente.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $clienteSQL = new Cliente();

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
        header("location:?c=cliente");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=cliente");
    }

}