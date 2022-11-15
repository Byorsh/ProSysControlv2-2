<?php

require_once "modelos/catalogo.php";

class CatalogoControlador{
    
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Catalogo;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/catalogo/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $catalogoSQL = new Catalogo();
        if(isset($_GET['id'])){
            $catalogoSQL=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/catalogo/acciones_Catalogo.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $catalogoSQL = new Catalogo();

        $catalogoSQL->setId(intval($_POST['idProducto']));
        $catalogoSQL->setDescripcion($_POST['descripcion']);
        $catalogoSQL->setMarca($_POST['marca']);
        $catalogoSQL->setModelo($_POST['modelo']);
        $catalogoSQL->setCantidad(intval($_POST['cantidad']));
        $catalogoSQL->setPrecioCompra(floatval($_POST['precioCompra']));
        $catalogoSQL->setPrecioVenta(floatval($_POST['precioVenta']));
        $catalogoSQL->setIva(intval($_POST['iva']));

        $catalogoSQL->getId() > 0 ?
        $this->modelo->Actualizar($catalogoSQL) :
        $this->modelo->Insertar($catalogoSQL);
        header("location:?c=catalogo");
    }
    
    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=catalogo");
    }

}