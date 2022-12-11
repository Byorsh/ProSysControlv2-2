<?php

class Domicilio{
    private $udo;

    private $id;
    private $id_Cliente;
    private $problematica;
    private $observaciones;
    private $fechaProgramada; 
    private $presupuesto; 
    private $costoTotal;  
    private $horaInicio;
    private $horaFinal;
    private $horasRealizadas;

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
        return $this->id_Cliente;
    }

    public function setIdCliente(int $id_Cliente){
        $this->id_Cliente = $id_Cliente;
    }

    public function getProblematica() : ?string{
        return $this->problematica;
    }

    public function setProblematica(string $problematica){
        $this->problematica = $problematica;
    }

    public function getObservaciones() : ?string{
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones){
        $this->observaciones = $observaciones;
    }

    public function getFechaProgramada() : ?string{
        return $this->fechaProgramada;
    }

    public function setFechaProgramada(string $fechaProgramada){
        $this->fechaProgramada = $fechaProgramada;
    }

    public function getPresupuesto() : ?float{
        return $this->presupuesto;
    }

    public function setPresupuesto(float $presupuesto){
        $this->presupuesto = $presupuesto;
    }

    public function getCostoTotal() : ?float{
        return $this->costoTotal;
    }

    public function setCostoTotal(float $costoTotal){
        $this->costoTotal = $costoTotal;
    }

    public function getHoraInicio() : ?string{
        return $this->horaInicio;
    }

    public function setHoraInicio(string $horaInicio){
        $this->horaInicio = $horaInicio;
    }

    public function getHoraFinal() : ?string{
        return $this->horaFinal;
    }

    public function setHoraFinal(string $horaFinal){
        $this->horaFinal = $horaFinal;
    }

    public function getTotalHoras() : ?int{
        return $this->horasRealizadas;
    }

    public function setTotalHoras(int $horasRealizadas){
        $this->horasRealizadas = $horasRealizadas;
    }

    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS Cantidad de Servicios a Domicilio FROM domicilio;");
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
            $consulta = $this->pdo->prepare("SELECT * FROM domicilio;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function ListarClientes(){
        try{
            $consulta = $this->pdo->prepare("SELECT idClientes,nombreCliente,apellidoP,apellidoM FROM `clientes`;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function ListarTelefonoYCorreo(){
        try{
            $consulta = $this->pdo->prepare("SELECT idClientes,telefono,email FROM `clientes`;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function ListarDomicilios(){
        try{
            $consulta = $this->pdo->prepare("SELECT idClientes,domicilio FROM `clientes`;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function buscarCliente($nombre){
        try{
            $consulta = $this->pdo->prepare("SELECT nombreCliente,apellidoP,apellidoM,telefono,email,domicilio FROM `clientes`WHERE idClientes =?;");
            $consulta->execute(array($nombre));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Obtener($nombre){
        try{
            $consulta = $this ->pdo ->prepare("SELECT * FROM domicilio WHERE id=?;");
            $consulta->execute(array($nombre));
            $reDomicilio=$consulta->fetch(PDO::FETCH_OBJ);
            $domicilioSQL=new Domicilio();

            $domicilioSQL->setId($reDomicilio->id);
            $domicilioSQL->setIdCliente($reDomicilio->id_Cliente);
            $domicilioSQL->setProblematica($reDomicilio->problematica);
            $domicilioSQL->setObservaciones($reDomicilio->observaciones);
            $domicilioSQL->setFechaProgramada($reDomicilio->fechaProgramada);
            $domicilioSQL->setPresupuesto($reDomicilio->presupuesto);
            $domicilioSQL->setCostoTotal($reDomicilio->costoTotal);
            $domicilioSQL->setHoraInicio($reDomicilio->horaInicio);
            $domicilioSQL->setHoraFinal($reDomicilio->horaFinal);
            $domicilioSQL->setTotalHoras($reDomicilio->horasRealizadas);

            return $domicilioSQL;
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }


    public function Insertar(Domicilio $domicilioSQL){
        try{
            $consulta = "INSERT INTO domicilio(id,id_Cliente, problematica, observaciones, fechaProgramada, presupuesto, costoTotal, horaInicio, horaFinal, horasRealizadas) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $domicilioSQL->NULL,
                $domicilioSQL->getIdCliente(),
                $domicilioSQL->getProblematica(),
                $domicilioSQL->getObservaciones(),
                $domicilioSQL->getFechaProgramada(),
                $domicilioSQL->getPresupuesto(),
                $domicilioSQL->getCostoTotal(),
                $domicilioSQL->getHoraInicio(),
                $domicilioSQL->getHoraFinal(),
                $domicilioSQL->getTotalHoras()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Actualizar(Domicilio $domicilioSQL){
        try{
            $consulta = "UPDATE domicilio SET
            id_Cliente=?,
            problematica=?,
            observaciones=?,
            fechaProgramada=?,
            presupuesto=?,
            costoTotal=?,
            horaInicio=?,
            horaFinal=?,
            horasRealizadas=?
            WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $domicilioSQL->getIdCliente(),
                $domicilioSQL->getProblematica(),
                $domicilioSQL->getObservaciones(),
                $domicilioSQL->getFechaProgramada(),
                $domicilioSQL->getPresupuesto(),
                $domicilioSQL->getCostoTotal(),
                $domicilioSQL->getHoraInicio(),
                $domicilioSQL->getHoraFinal(),
                $domicilioSQL->getTotalHoras(),
                $domicilioSQL->getId()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM domicilio WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
}