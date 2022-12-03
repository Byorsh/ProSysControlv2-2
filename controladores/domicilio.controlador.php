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
        $domicilioSQL->setProblematica($_POST['problematica']);
        $domicilioSQL->setObservaciones($_POST['observaciones']);
        $domicilioSQL->setNs($_POST['ns']);
        $domicilioSQL->setMarca($_POST['marca']);
        $domicilioSQL->setModelo($_POST['modelo']);
        $domicilioSQL->settipoEquipo($_POST['tipoEquipo']);
        $domicilioSQL->setFechaPrometida($_POST['fechaPrometida']);
        $domicilioSQL->setPresupuesto(floatval($_POST['presupuesto']));
        $domicilioSQL->setCostoTotal(floatval($_POST['costoTotal']));
        $domicilioSQL->setHoraInicio($_POST['horaInicio']);
        $domicilioSQL->setHoraFinal($_POST['horaFinal']);
        $domicilioSQL->setTotalHoras(intval($_POST['horasRealizadas']));


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