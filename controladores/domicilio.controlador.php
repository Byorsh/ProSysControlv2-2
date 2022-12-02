<?php

require_once "modelos/domicilio.php";

class DomicilioControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Domicilio;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/domicilio/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        
        require_once "vistas/encabezado.php";
        require_once "vistas/domicilio/agregar_Domicilio.php";
        require_once "vistas/pie.php";
    }

    public function FormModificar(){
        $domicilioSQL = new Domicilio();
        if(isset($_GET['id'])){
            $domicilioSQL=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }
        
        require_once "vistas/encabezado.php";
        require_once "vistas/domicilio/modificar_Domicilio.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $domicilioSQL = new Domicilio();

        $domicilioSQL->setId(intval($_POST['id']));
        $domicilioSQL->setIdCliente(intval($_POST['idCliente']));
        $domicilioSQL->setNs($_POST['ns']);
        $domicilioSQL->setMarca($_POST['marca']);
        $domicilioSQL->setModelo($_POST['modelo']);
        $domicilioSQL->settipoEquipo($_POST['tipoEquipo']);
        $domicilioSQL->setObservaciones($_POST['observaciones']);
        $domicilioSQL->setAccesorios($_POST['accesorios']);
        $domicilioSQL->setFechaEntrada($_POST['fechaEntrada']);
        $domicilioSQL->setHoraEntrada($_POST['horaEntrada']);
        $domicilioSQL->setFechaPrometida($_POST['fechaPrometida']);
        $domicilioSQL->settecnicoAsignado(intval($_POST['tecnicoAsignado']));
        $domicilioSQL->setestadoEquipo($_POST['estadoEquipo']);


        $domicilioSQL->getId() > 0 ?
        $this->modelo->Actualizar($domicilioSQL) :
        $this->modelo->Insertar($domicilioSQL);
        header("location:?c=domicilio");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=domicilio");
    }

}