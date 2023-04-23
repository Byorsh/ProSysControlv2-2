<?php

class Cliente{
    private $pdo;

    private $id;
    private $rfc;
    private $nombre;
    private $apellidosC;
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

    public function getApellidos() : ? string{
        return $this->apellidosC;
    }

    public function setApellidos(string $apellidosC){
        $this->apellidosC = $apellidosC;
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

    public function Paginar($limite,$numerodeRegistros){
        try{
            $where="";
            if(isset($_GET["q"])){
                $columnas = ['idClientes','nombreCliente','apellidosC','nombreEmpresa','telefono','email','domicilio'];
                $where = "WHERE (";
            
                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columnas[$i] . " LIKE '%" . $_GET["q"] . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= ")";
            }
            echo "SELECT * FROM `clientes` $where LIMIT $limite,$numerodeRegistros;";
            $consulta = $this->pdo->prepare("SELECT * FROM `clientes` $where LIMIT $limite,$numerodeRegistros;");
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
            $clienteSQL=new Cliente();

            $clienteSQL->setId($reCliente->idClientes);
            $clienteSQL->setRfc($reCliente->rfc);
            $clienteSQL->setNombre($reCliente->nombreCliente);
            $clienteSQL->setApellidos($reCliente->apellidosC);
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
            $consulta = "INSERT INTO clientes(rfc, nombreCliente, apellidosC, nombreEmpresa, telefono, email, domicilio) 
            VALUES (?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $clienteSQL->getRfc(),
                $clienteSQL->getNombre(),
                $clienteSQL->getApellidos(),
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
            apellidosC=?,
            nombreEmpresa=?,
            telefono=?,
            email=?,
            domicilio=?
            WHERE idClientes=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $clienteSQL->getRfc(),
                $clienteSQL->getNombre(),
                $clienteSQL->getApellidos(),
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
    
    public function buscarTecnicoAsignado($nombre){
        try{
            $consulta = $this->pdo->prepare("SELECT nombre,apellido FROM `usuario`WHERE id =?;");
            $consulta->execute(array($nombre));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
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
    public function BuscarEnTabla($busqueda){
        try{
            
            $columnas = ['idClientes','nombreCliente','apellidosC','nombreEmpresa','telefono','email','domicilio'];
            if ($busqueda != null) {
                $where = "WHERE (";
            
                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columnas[$i] . " LIKE '%" . $busqueda . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= ")";
            }
            $consulta = $this->pdo->prepare("SELECT * FROM clientes ".$where.";");
            
             //echo("SELECT * FROM ordenreparacion ".$where." AND estadoEquipo $not '10';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }

    }
    
}