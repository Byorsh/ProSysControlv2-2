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


    public function Paginar($limite,$numerodeRegistros){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM `ordenreparacion` LIMIT $limite,$numerodeRegistros;");
            $consulta->execute();
            

            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    //
    public function ListarTecnicos(){
        try{
            $consulta = $this->pdo->prepare("SELECT id,nombre,apellido,user FROM `usuario` WHERE privilegio = 2;");
            $consulta->execute();


            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }


    public function ListarAdministradores(){
        try{
            $consulta = $this->pdo->prepare("SELECT id,nombre,apellido,user FROM `usuario` WHERE privilegio = 1;");
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
    public function buscarCliente($nombre){
        try{
            $consulta = $this->pdo->prepare("SELECT nombreCliente,apellidoP,apellidoM,telefono,email,domicilio FROM `clientes`WHERE idClientes =?;");
            $consulta->execute(array($nombre));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
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
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                //$tallerSQL->NULL,
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
            $tallerSQL->EnviarCorreos($tallerSQL->gettecnicoAsignado(), $tallerSQL->getIdCliente());

        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function EnviarCorreos(int $idTecnico, int $idCliente){
        
        try{
            $consulta = $this->pdo->prepare("SELECT nombre, email FROM usuario WHERE id=?;");
            $consulta->execute(array($idTecnico));
            $reTec=$consulta->fetch(PDO::FETCH_OBJ);
            require_once "modelos/correo.php";
            $correo = new Correo();

            $correo->setFromEmail($reTec->email);
            $correo->setFromName($reTec->nombre);
            $correo->setMailSubject("Orden de reparacion de prueba");
            $correo->setMessage("Esta es la orden de reparacion de prueba Vers. Tecnico");
            $correo->setMailUsername("gion340@gmail.com");
            $correo->setMailUser("Jorge B");
            $correo->setMailUserpassword("kxgoxrrwwzimxxui");
            $correo->setAddaddress($reTec->email);
            $correo->setTemplate("email_template.html");
           
            $this->model = new Correo;
            $this->model->sendemail($correo);
        }catch (Exception $e){
            echo "Ha ocurrido un error al enviar el mensaje: {$mail->ErrorInfo}";
        }

        try{
            $consulta = $this->pdo->prepare("SELECT nombreCliente, email FROM clientes WHERE idClientes=?;");
            $consulta->execute(array($idCliente));
            $reCli=$consulta->fetch(PDO::FETCH_OBJ);
            require_once "modelos/correo.php";
            $correo = new Correo();

            $correo->setFromEmail($reCli->email);
            $correo->setFromName($reCli->nombreCliente);
            $correo->setMailSubject("Orden de reparacion de prueba");
            $correo->setMessage("Esta es la orden de reparacion de prueba Vers. Cliente");
            $correo->setMailUsername("gion340@gmail.com");
            $correo->setMailUser("Jorge B");
            $correo->setMailUserpassword("kxgoxrrwwzimxxui");
            $correo->setAddaddress($reCli->email);
            $correo->setTemplate("email_template.html");
      
            $this->model = new Correo;
            $this->model->sendemail($correo);
        }catch (Exception $e){
            echo "Ha ocurrido un error al enviar el mensaje: {$mail->ErrorInfo}";
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