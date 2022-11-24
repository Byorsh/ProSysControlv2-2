<?php

require_once "modelos/taller.php";

class TallerControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Taller;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/taller/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $tallerSQL = new Taller();
        if(isset($_GET['id'])){
            $tallerSQL=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/taller/acciones_Taller.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $tallerSQL = new Taller();

        $tallerSQL->setId(intval($_POST['id']));
        $tallerSQL->setIdCliente(intval($_POST['idCliente']));
        $tallerSQL->setNs($_POST['ns']);
        $tallerSQL->setMarca($_POST['marca']);
        $tallerSQL->setModelo($_POST['modelo']);
        $tallerSQL->setObservaciones($_POST['observaciones']);
        $tallerSQL->setAccesorios($_POST['accesorios']);
        $tallerSQL->setFechaEntrada($_POST['fechaEntrada']);
        $tallerSQL->setHoraEntrada($_POST['horaEntrada']);
        $tallerSQL->setFechaPrometida($_POST['fechaPrometida']);

        $tallerSQL->getId() > 0 ?
        $this->modelo->Actualizar($tallerSQL) :
        $this->modelo->Insertar($tallerSQL);
        header("location:?c=catalogo");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=taller");
    }

}