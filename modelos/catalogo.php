<?php

class Catalogo{
    private $pdo;

    private $id;
    private $descripcion;
    private $marca;
    private $modelo;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    private $iva;  

    public function __CONSTRUCT(){
        $this->pdo = Database::Conectar();
    }

    public function getId() : ?int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getDescripcion() : ?string{
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
    }

    public function getMarca() : ?string{
        return $this->marca;
    }

    public function setMarca(string $marca){
        $this->marca = $marca;
    }

    public function getModelo() : ?string{
        return $this->modelo;
    }

    public function setModelo(string $modelo){
        $this->modelo = $modelo;
    }

    public function getCantidad() : ?int{
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad){
        $this->cantidad = $cantidad;
    }

    public function getPrecioCompra() : ?float{
        return $this->precioCompra;
    }

    public function setPrecioCompra(float $precioCompra){
        $this->precioCompra = $precioCompra;
    }

    public function getPrecioVenta() : ?float{
        return $this->precioVenta;
    }

    public function setPrecioVenta(float $precioVenta){
        $this->precioVenta = $precioVenta;
    }

    public function getIva() : ?int{
        return $this->iva;
    }

    public function setIva(int $iva){
        $this->iva = $iva;
    }


    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(cantidad) AS CantidadProductos FROM catalogo;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    /*public function Total(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(precio) AS Total FROM videojuegos;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }*/

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM catalogo;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Paginar($limite,$numerodeRegistros){
        try{
            $where="";
            if(isset($_GET["q"])){
                $busqueda = $_GET["q"];
                if(substr($busqueda,0,3)=='idp' && ($numdigitos=strlen($busqueda)-3)>0){
                    $numdigitos=strlen($busqueda)-3;
                    $idbusqueda=(substr($busqueda,-$numdigitos));
                    $consulta = $this->pdo->prepare("SELECT * FROM catalogo WHERE idProducto = $idbusqueda ;");
                    $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);}

                $columnas = ['idProducto','descripcion','marca','modelo','cantidad','preciocompra','precioventa'];
                $where = "WHERE (";
            
                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columnas[$i] . " LIKE '%" . $_GET["q"] . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= ")";
            }
            //echo "SELECT * FROM `clientes` $where LIMIT $limite,$numerodeRegistros;";
            $consulta = $this->pdo->prepare("SELECT * FROM `catalogo` $where LIMIT $limite,$numerodeRegistros;");
            $consulta->execute();
            

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }


    public function Obtener($nombre){
        try{
            $consulta = $this ->pdo ->prepare("SELECT * FROM catalogo WHERE idProducto=?;");
            $consulta->execute(array($nombre));
            $reCatalogo=$consulta->fetch(PDO::FETCH_OBJ);
            $catalogoSQL=new Catalogo();

            $catalogoSQL->setId($reCatalogo->idProducto);
            $catalogoSQL->setDescripcion($reCatalogo->descripcion);
            $catalogoSQL->setMarca($reCatalogo->marca);
            $catalogoSQL->setModelo($reCatalogo->modelo);
            $catalogoSQL->setCantidad($reCatalogo->cantidad);
            $catalogoSQL->setPrecioCompra($reCatalogo->precioCompra);
            $catalogoSQL->setPrecioVenta($reCatalogo->precioVenta);
            $catalogoSQL->setIva($reCatalogo->iva);

            return $catalogoSQL;
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Insertar(Catalogo $catalogoSQL){
        try{
            $consulta = "INSERT INTO catalogo(descripcion, marca, modelo, cantidad, precioCompra, precioVenta, iva) 
            VALUES (?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $catalogoSQL->getDescripcion(),
                $catalogoSQL->getMarca(),
                $catalogoSQL->getModelo(),
                $catalogoSQL->getCantidad(),
                $catalogoSQL->getPrecioCompra(),
                $catalogoSQL->getPrecioVenta(),
                $catalogoSQL->getIva()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Actualizar(Catalogo $catalogoSQL){
        try{
            $consulta = "UPDATE catalogo SET
            descripcion=?,
            marca=?,
            modelo=?,
            cantidad=?,
            precioCompra=?,
            precioVenta=?,
            iva=?
            WHERE idProducto=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $catalogoSQL->getDescripcion(),
                $catalogoSQL->getMarca(),
                $catalogoSQL->getModelo(),
                $catalogoSQL->getCantidad(),
                $catalogoSQL->getPrecioCompra(),
                $catalogoSQL->getPrecioVenta(),
                $catalogoSQL->getIva(),
                $catalogoSQL->getId()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM catalogo WHERE idProducto=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function BuscarEnTabla($busqueda){
        try{
            if(substr($busqueda,0,3)=='idp' && ($numdigitos=strlen($busqueda)-3)>0){
                $numdigitos=strlen($busqueda)-3;
                $idbusqueda=(substr($busqueda,-$numdigitos));
                $consulta = $this->pdo->prepare("SELECT * FROM catalogo WHERE idProducto = $idbusqueda ;");
                $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);}

            $columnas = ['idProducto','descripcion','marca','modelo','cantidad','preciocompra','precioventa'];
            if ($busqueda != null) {
            $where = "WHERE (";
            
                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columnas[$i] . " LIKE '%" . $busqueda . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= ")";
            }
            $consulta = $this->pdo->prepare("SELECT * FROM catalogo ".$where.";");
            
             //echo("SELECT * FROM ordenreparacion ".$where." AND estadoEquipo $not '10';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }

    }
}