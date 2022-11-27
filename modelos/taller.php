<?php

class Taller{
    private $udo;

    private $id;
    private $idCliente;
    private $ns;
    private $marca;
    private $modelo;
    private $tipoEquipo;
    private $observaciones;
    private $accesorios;
    private $fechaEntrada; 
    private $horaEntrada; 
    private $fechaPrometida;  
    private $tecnicoAsignado;
    private $estadoEquipo;

    public function __CONSTRUCT(){
        $this->pdo = Database::Conectar();
    }

    public function getId() : ?int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getIdCliente() : ?int{
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente){
        $this->idCliente = $idCliente;
    }

    public function getNs() : ?string{
        return $this->ns;
    }

    public function setNs(string $ns){
        $this->ns = $ns;
    }

    public function gettipoEquipo() : ?string{
        return $this->tipoEquipo;
    }

    public function settipoEquipo(string $tipoEquipo){
        $this->tipoEquipo = $tipoEquipo;
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

    public function getObservaciones() : ?string{
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones){
        $this->observaciones = $observaciones;
    }

    public function getAccesorios() : ?string{
        return $this->accesorios;
    }

    public function setAccesorios(string $accesorios){
        $this->accesorios = $accesorios;
    }

    public function getFechaEntrada() : ?string{
        return $this->fechaEntrada;
    }

    public function setFechaEntrada(string $fechaEntrada){
        $this->fechaEntrada = $fechaEntrada;
    }

    public function getHoraEntrada() : ?string{
        return $this->horaEntrada;
    }

    public function setHoraEntrada(string $horaEntrada){
        $this->horaEntrada = $horaEntrada;
    }

    public function getFechaPrometida() : ?string{
        return $this->fechaPrometida;
    }

    public function setFechaPrometida(string $fechaPrometida){
        $this->fechaPrometida = $fechaPrometida;
    }

    public function gettecnicoAsignado() : ?int{
        return $this->tecnicoAsignado;
    }

    public function settecnicoAsignado(int $tecnicoAsignado){
        $this->tecnicoAsignado = $tecnicoAsignado;
    }

    public function getestadoEquipo() : ?string{
        return $this->estadoEquipo;
    }

    public function setestadoEquipo(string $estadoEquipo){
        $this->estadoEquipo = $estadoEquipo;
    }

    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS Cantidad de Equipos en Taller FROM ordenreparacion;");
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
            $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Obtener($nombre){
        try{
            $consulta = $this ->pdo ->prepare("SELECT * FROM ordenreparacion WHERE id=?;");
            $consulta->execute(array($nombre));
            $reTaller=$consulta->fetch(PDO::FETCH_OBJ);
            $tallerSQL=new Taller();

            $tallerSQL->setId($reTaller->id);
            $tallerSQL->setIdCliente($reTaller->idCliente);
            $tallerSQL->setNs($reTaller->ns);
            $tallerSQL->setMarca($reTaller->marca);
            $tallerSQL->setModelo($reTaller->modelo);
            $tallerSQL->settipoEquipo($reTaller->tipoEquipo);
            $tallerSQL->setObservaciones($reTaller->observaciones);
            $tallerSQL->setAccesorios($reTaller->accesorios);
            $tallerSQL->setFechaEntrada($reTaller->fechaEntrada);
            $tallerSQL->setHoraEntrada($reTaller->horaEntrada);
            $tallerSQL->setFechaPrometida($reTaller->fechaPrometida);
            $tallerSQL->settecnicoAsignado($reTaller->tecnicoAsignado);
            $tallerSQL->setestadoEquipo($reTaller->estadoEquipo);

            return $tallerSQL;
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }


    public function Insertar(Taller $tallerSQL){
        try{
            $consulta = "INSERT INTO ordenreparacion(idCliente, ns, marca, modelo, tipoEquipo, observaciones, accesorios, fechaEntrada, horaEntrada, fechaPrometida, tecnicoAsignado, estadoEquipo) 
            VALUES (?,?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $tallerSQL->getIdCliente(),
                $tallerSQL->getNs(),
                $tallerSQL->getMarca(),
                $tallerSQL->getModelo(),
                $tallerSQL->gettipoEquipo(),
                $tallerSQL->getObservaciones(),
                $tallerSQL->getAccesorios(),
                $tallerSQL->getFechaEntrada(),
                $tallerSQL->getHoraEntrada(),
                $tallerSQL->getFechaPrometida(),
                $tallerSQL->gettecnicoAsignado(),
                $tallerSQL->getestadoEquipo()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Actualizar(Taller $tallerSQL){
        try{
            $consulta = "UPDATE ordenreparacion SET
            idCliente=?,
            ns=?,
            marca=?,
            modelo=?,
            tipoEquipo=?,
            observaciones=?,
            accesorios=?,
            fechaEntrada=?,
            horaEntrada=?,
            fechaPrometida=?,
            tecnicoAsignado=?,
            estadoEquipo=?
            WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $tallerSQL->getIdCliente(),
                $tallerSQL->getNs(),
                $tallerSQL->getMarca(),
                $tallerSQL->getModelo(),
                $tallerSQL->gettipoEquipo(),
                $tallerSQL->getObservaciones(),
                $tallerSQL->getAccesorios(),
                $tallerSQL->getFechaEntrada(),
                $tallerSQL->getHoraEntrada(),
                $tallerSQL->getFechaPrometida(),
                $tallerSQL->gettecnicoAsignado(),
                $tallerSQL->getestadoEquipo(),
                $tallerSQL->getId()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM ordenreparacion WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
}