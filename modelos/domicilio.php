<?php

class Domicilio{
    private $pdo;

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
    private $estado;
    private $cobrado;

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

    public function getTotalHoras() : ?float{
        return $this->horasRealizadas;
    }

    public function setTotalHoras(float $horasRealizadas){
        $this->horasRealizadas = $horasRealizadas;
    }
    public function getEstado() : ?string{
        return $this->estado;
    }

    public function setEstado(string $estado){
        $this->estado = $estado;
    }
    public function getCobrado() : ?string{
        return $this->cobrado;
    }

    public function setCobrado(string $cobrado){
        $this->cobrado = $cobrado;
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

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM domicilio WHERE NOT(estado LIKE 'Finalizado' AND cobrado LIKE 'Si');");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function ListarYaEntregados()
    {
        try {
            //SELECT * FROM `ordenreparacion` WHERE `estadoEquipo` NOT LIKE '10' ORDER BY `fechaEntrada` ASC LIMIT 10,10;
            $consulta = $this->pdo->prepare("SELECT * FROM domicilio WHERE estado LIKE 'Finalizado' AND cobrado LIKE 'Si' ;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

    public function ListarClientes(){
        try{
            $consulta = $this->pdo->prepare("SELECT idClientes,nombreCliente,apellidosC FROM `clientes`;");
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
            $consulta = $this->pdo->prepare("SELECT nombreCliente,apellidosC,telefono,email,domicilio FROM `clientes`WHERE idClientes =?;");
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
            $domicilioSQL->setEstado($reDomicilio->estado);
            $domicilioSQL->setCobrado($reDomicilio->cobrado);


            return $domicilioSQL;
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }


    public function Insertar(Domicilio $domicilioSQL){
        try{
            $consulta = "INSERT INTO domicilio(id_Cliente, problematica, observaciones, fechaProgramada, presupuesto, costoTotal, horaInicio, horaFinal, horasRealizadas,estado,cobrado) 
            VALUES (?,?,?,?,?,?,?, STR_TO_DATE(?, '%m-%d-%Y %H:%i:%s'),?,?,?)";
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
                $domicilioSQL->getEstado(),
                $domicilioSQL->getCobrado()
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
            horasRealizadas=?,
            estado=?,
            cobrado=?
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
                $domicilioSQL->getEstado(),
                $domicilioSQL->getCobrado(),
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
    //PAGINAR Y BUSCAR
    public function BuscarEnTabla($busqueda)
    {
        try {
            $not = "AND NOT(estado LIKE 'Finalizado' AND cobrado LIKE 'Si')";
            if (isset($_GET['filtro'])) {
                $not = "AND estado LIKE 'Finalizado' AND cobrado LIKE 'Si'";
            }
            if (substr($busqueda, 0, 3) == 'idc' && ($numdigitos = strlen($busqueda) - 3) > 0) {
                $numdigitos = strlen($busqueda) - 3;
                $idbusqueda = (substr($busqueda, -$numdigitos));
                $consulta = $this->pdo->prepare("SELECT * FROM domicilio WHERE id_Cliente = $idbusqueda ORDER BY fechaProgramada;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }

            $columnas = ['id', 'id_Cliente', 'problematica', 'observaciones', 'fechaProgramada', 'presupuesto', 'costoTotal', 'horaInicio', 'horaFinal', 'horasRealizadas', 'estado','cobrado'];
            if ($busqueda != null) {
                $where = "WHERE (";

                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columnas[$i] . " LIKE '%" . $busqueda . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= ")";
            }

            $consulta = $this->pdo->prepare("SELECT * FROM domicilio " . $where . " $not;");

            //echo("SELECT * FROM ordenreparacion ".$where." AND estadoEquipo $not '10';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }




    public function Paginar($limite, $numerodeRegistros, $filtroCondicion)
    {
        try {
            /*if(isset($filtroCondicion)){
                switch($filtroCondicion){
                    case "fechaasc":
                        echo "si";
                        break;
                    case "fechadec":
                        echo "si";
                        break;
                    case "yaentregado":
                        echo "si";
                        break;
                    case "algonose":
                        echo "si";
                        break;
                }
            }*/
            $and = "";
            if (isset($_GET["q"])) {
                $columnas = ['id', 'id_Cliente', 'problematica', 'observaciones', 'fechaProgramada', 'presupuesto', 'costoTotal', 'horaInicio', 'horaFinal', 'horasRealizadas', 'estado','cobrado'];
                $and = "AND (";

                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $and .= $columnas[$i] . " LIKE '%" . $_GET["q"] . "%' OR ";
                }
                $and = substr_replace($and, "", -3);
                $and .= ")";
                $busqueda = $_GET["q"];
                if (substr($busqueda, 0, 3) == 'idc' && ($numdigitos = strlen($busqueda) - 3) > 0) {
                    $numdigitos = strlen($busqueda) - 3;
                    $idbusqueda = (substr($busqueda, -$numdigitos));
                    $consulta = $this->pdo->prepare("SELECT * FROM domicilio WHERE id_Cliente = $idbusqueda ORDER BY fechaProgramada LIMIT $limite,$numerodeRegistros;");
                    $consulta->execute();
                    return $consulta->fetchAll(PDO::FETCH_OBJ);
                }
            }
            if (isset($_GET["filtro"])) {
                if ($_GET["filtro"] == "yaentregados") {

                    $consulta = $this->pdo->prepare("SELECT * FROM `domicilio` WHERE estado LIKE 'Finalizado' AND cobrado LIKE 'Si' $and ORDER BY `fechaProgramada` LIMIT $limite,$numerodeRegistros;");
                    //echo "SELECT * FROM `ordenreparacion` WHERE `estadoEquipo`='10' $and ORDER BY `fechaEntrada` LIMIT $limite,$numerodeRegistros;";
                } else {
                    $consulta = $this->pdo->prepare("SELECT * FROM `domicilio` WHERE NOT(estado LIKE 'Finalizado' AND cobrado LIKE 'Si') $and ORDER BY `fechaProgramada` LIMIT $limite,$numerodeRegistros;");
                    //echo "SELECT * FROM `ordenreparacion` WHERE `estadoEquipo`  NOT LIKE '10' $and ORDER BY `fechaEntrada` LIMIT $limite,$numerodeRegistros;";
                }
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM `domicilio` WHERE NOT(estado LIKE 'Finalizado' AND cobrado LIKE 'Si') $and ORDER BY `fechaProgramada` LIMIT $limite,$numerodeRegistros;");
            }

            $consulta->execute();


            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

}