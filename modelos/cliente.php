<?php

class Cliente{
    private $udo;

    private $id;
    private $rfc;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $nombreEmpresa;
    private $telefono;
    private $email;
    private $domicilio;    

    public function __CONSTRUCT(){
        $this->pdo = Database::Conectar();
    }

    public function getId() : ?int{
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getRfc() : ?string{
        return $this->rfc;
    }

    public function setRfc(string $rfc){
        $this->rfc = $rfc;
    }

    public function getNombre() : ? string{
        return $this->nombre;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function getApellidoP() : ? string{
        return $this->apellidoP;
    }

    public function setApellidoP(string $apellidoP){
        $this->apellidoP = $apellidoP;
    }

    public function getApellidoM() : ? string{
        return $this->apellidoM;
    }

    public function setApellidoM(string $apellidoM){
        $this->apellidoM = $apellidoM;
    }

    public function getNombreEmpresa() : ? string{
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa(string $nombreEmpresa){
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function getTelefono() : ? string{
        return $this->telefono;
    }

    public function setTelefono(string $telefono){
        $this->telefono = $telefono;
    }

    public function getEmail() : ?string{
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getDomicilio() : ?string{
        return $this->domicilio;
    }

    public function setDomicilio(string $domicilio){
        $this->domicilio = $domicilio;
    }


    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS CantidadUsuario FROM clientes;");
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
            $consulta = $this->pdo->prepare("SELECT * FROM clientes;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Obtener($nombre){
        try{
            $consulta = $this ->pdo ->prepare("SELECT * FROM clientes WHERE idClientes=?;");
            $consulta->execute(array($nombre));
            $reCliente=$consulta->fetch(PDO::FETCH_OBJ);
            $clienteSQL=new Usuario();

            $clienteSQL->setId($reCliente->id);
            $clienteSQL->setRfc($reCliente->rfc);
            $clienteSQL->setNombre($reCliente->nombre);
            $clienteSQL->setApellidoP($reCliente->apellidoP);
            $clienteSQL->setApellidoM($reCliente->apellidoM);
            $clienteSQL->setNombreEmpresa($reCliente->nombreEmpresa);
            $clienteSQL->setTelefono($reCliente->telefono);
            $clienteSQL->setEmail($reCliente->email);
            $clienteSQL->setDomicilio($reCliente->domicilio);

            return $clienteSQL;
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Insertar(Cliente $clienteSQL){
        try{
            $consulta = "INSERT INTO clientes(rfc, nombreCliente, apellidoP, apellidoM, nombreEmpresa, telefono, email, domicilio) 
            VALUES (?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $clienteSQL->getRfc(),
                $clienteSQL->getNombre(),
                $clienteSQL->getApellidoP(),
                $clienteSQL->getApellidoM(),
                $clienteSQL->getNombreEmpresa(),
                $clienteSQL->getTelefono(),
                $clienteSQL->getEmail(),
                $clienteSQL->getDomicilio()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Actualizar(Cliente $clienteSQL){
        try{
            $consulta = "UPDATE clientes SET
            rfc=?,
            nombreCliente=?,
            apellidoP=?,
            apellidoM=?,
            nombreEmpresa=?,
            telefono=?,
            email=?,
            domicilio=?
            WHERE idClientes=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $clienteSQL->getRfc(),
                $clienteSQL->getNombre(),
                $clienteSQL->getApellidoP(),
                $clienteSQL->getApellidoM(),
                $clienteSQL->getNombreEmpresa(),
                $clienteSQL->getTelefono(),
                $clienteSQL->getEmail(),
                $clienteSQL->getDomicilio(),
                $clienteSQL->getId()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM clientes WHERE idClientes=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
}