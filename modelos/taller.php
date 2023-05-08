<?php


class Taller
{
    private $pdo;

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
    private $cobrado;

    public function __CONSTRUCT()
    {
        $this->pdo = Database::Conectar();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getIdCliente(): ?int
    {
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getNs(): ?string
    {
        return $this->ns;
    }

    public function setNs(string $ns)
    {
        $this->ns = $ns;
    }

    public function gettipoEquipo(): ?string
    {
        return $this->tipoEquipo;
    }

    public function settipoEquipo(string $tipoEquipo)
    {
        $this->tipoEquipo = $tipoEquipo;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca)
    {
        $this->marca = $marca;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo)
    {
        $this->modelo = $modelo;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones)
    {
        $this->observaciones = $observaciones;
    }

    public function getAccesorios(): ?string
    {
        return $this->accesorios;
    }

    public function setAccesorios(string $accesorios)
    {
        $this->accesorios = $accesorios;
    }

    public function getFechaEntrada(): ?string
    {
        return $this->fechaEntrada;
    }

    public function setFechaEntrada(string $fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;
    }

    public function getHoraEntrada(): ?string
    {
        return $this->horaEntrada;
    }

    public function setHoraEntrada(string $horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;
    }

    public function getFechaPrometida(): ?string
    {
        return $this->fechaPrometida;
    }

    public function setFechaPrometida(string $fechaPrometida)
    {
        $this->fechaPrometida = $fechaPrometida;
    }

    public function gettecnicoAsignado(): ?int
    {
        return $this->tecnicoAsignado;
    }

    public function settecnicoAsignado(int $tecnicoAsignado)
    {
        $this->tecnicoAsignado = $tecnicoAsignado;
    }

    public function getestadoEquipo(): ?string
    {
        return $this->estadoEquipo;
    }

    public function setestadoEquipo(string $estadoEquipo)
    {
        $this->estadoEquipo = $estadoEquipo;
    }
    public function getCobrado() : ?string{
        return $this->cobrado;
    }

    public function setCobrado(string $cobrado){
        $this->cobrado = $cobrado;
    }

    public function Cantidad()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS Cantidad de Equipos en Taller FROM ordenreparacion;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
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

    public function Listar()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE `estadoEquipo` NOT LIKE '10';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }
    public function ListarYaEntregados()
    {
        try {
            //SELECT * FROM `ordenreparacion` WHERE `estadoEquipo` NOT LIKE '10' ORDER BY `fechaEntrada` ASC LIMIT 10,10;
            $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE `estadoEquipo`='10' AND `cobrado`='Si' ;");
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
                $columnas = ['id', 'idCliente', 'ns', 'marca', 'modelo', 'tipoEquipo', 'observaciones', 'accesorios', 'fechaEntrada', 'horaEntrada', 'fechaPrometida', 'tecnicoAsignado', 'estadoEquipo', 'cobrado'];
                $and = "AND (";

                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $and .= $columnas[$i] . " LIKE '%" . $_GET["q"] . "%' OR ";
                }
                $and = substr_replace($and, "", -3);
                $and .= ")";
                $busqueda = $_GET["q"];
                if (substr($busqueda, 0, 3) == 'idt' && ($numdigitos = strlen($busqueda) - 3) > 0) {
                    $numdigitos = strlen($busqueda) - 3;
                    $idbusqueda = (substr($busqueda, -$numdigitos));
                    $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE tecnicoAsignado = $idbusqueda AND estadoEquipo NOT LIKE '10' LIMIT $limite,$numerodeRegistros;");
                    $consulta->execute();
                    return $consulta->fetchAll(PDO::FETCH_OBJ);
                }
                if (substr($busqueda, 0, 3) == 'idc' && ($numdigitos = strlen($busqueda) - 3) > 0) {
                    $numdigitos = strlen($busqueda) - 3;
                    $idbusqueda = (substr($busqueda, -$numdigitos));
                    $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE idCliente = $idbusqueda ORDER BY fechaPrometida, estadoEquipo, fechaEntrada LIMIT $limite,$numerodeRegistros;");
                    $consulta->execute();
                    return $consulta->fetchAll(PDO::FETCH_OBJ);
                }
            }
            if (isset($_GET["filtro"])) {
                if ($_GET["filtro"] == "yaentregados") {

                    $consulta = $this->pdo->prepare("SELECT * FROM `ordenreparacion` WHERE `estadoEquipo`='10' AND `cobrado`='Si' $and ORDER BY fechaPrometida, estadoEquipo, fechaEntrada LIMIT $limite,$numerodeRegistros;");
                    //echo "SELECT * FROM `ordenreparacion` WHERE `estadoEquipo`='10' $and ORDER BY `fechaEntrada` LIMIT $limite,$numerodeRegistros;";
                } else {
                    $consulta = $this->pdo->prepare("SELECT * FROM `ordenreparacion` WHERE `estadoEquipo`  NOT LIKE '10' $and ORDER BY fechaPrometida, estadoEquipo, fechaEntrada LIMIT $limite,$numerodeRegistros;");
                    //echo "SELECT * FROM `ordenreparacion` WHERE `estadoEquipo`  NOT LIKE '10' $and ORDER BY `fechaEntrada` LIMIT $limite,$numerodeRegistros;";
                }
            } else {
                $consulta = $this->pdo->prepare("SELECT * FROM `ordenreparacion` WHERE `estadoEquipo` NOT LIKE '10' $and ORDER BY fechaPrometida, estadoEquipo, fechaEntrada LIMIT $limite,$numerodeRegistros;");
            }

            $consulta->execute();


            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

    //
    public function ListarTecnicos()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT id,nombre,apellido,user FROM `usuario` WHERE privilegio = 2;");
            $consulta->execute();


            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }


    public function ListarAdministradores()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT id,nombre,apellido,user FROM `usuario` WHERE privilegio = 1;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }
    public function ListarClientes()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT idClientes,nombreCliente,apellidosC FROM `clientes`;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }
    public function ListarTelefonoYCorreo()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT idClientes,telefono,email FROM `clientes`;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }
    public function buscarCliente($nombre)
    {
        try {
            $consulta = $this->pdo->prepare("SELECT nombreCliente,apellidosC,telefono,email,domicilio FROM `clientes`WHERE idClientes =?;");
            $consulta->execute(array($nombre));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }
    public function buscarTecnicoAsignado($nombre)
    {
        try {
            $consulta = $this->pdo->prepare("SELECT nombre,apellido FROM `usuario`WHERE id =?;");
            $consulta->execute(array($nombre));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

    public function Obtener($nombre)
    {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE id=?;");
            $consulta->execute(array($nombre));
            $reTaller = $consulta->fetch(PDO::FETCH_OBJ);
            $tallerSQL = new Taller();

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
            $tallerSQL->setCobrado($reTaller->cobrado);

            return $tallerSQL;
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }


    public function Insertar(Taller $tallerSQL)
    {
        try {
            $consulta = "INSERT INTO ordenreparacion(idCliente, ns, marca, modelo, tipoEquipo, observaciones, accesorios, fechaEntrada, horaEntrada, fechaPrometida, tecnicoAsignado, estadoEquipo,cobrado) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
                $tallerSQL->getestadoEquipo(),
                $tallerSQL->getCobrado()

            ));

            try{
                $tallerSQL->EnviarCorreos($tallerSQL->gettecnicoAsignado(), $tallerSQL->getIdCliente(), $tallerSQL);
            }
            catch(Exception $ex){
                die($ex->getMessage());
            }
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

    public function EnviarCorreos(int $idTecnico, int $idCliente, Taller $Taller)
    {

        try {
            $consulta = $this->pdo->prepare("SELECT nombre, apellido, email FROM usuario WHERE id=?;");
            $consulta->execute(array($idTecnico));
            $reTec = $consulta->fetch(PDO::FETCH_OBJ);
            

            try {
                $consulta = $this->pdo->prepare("SELECT nombreCliente, apellidosC, email, telefono FROM clientes WHERE idClientes=?;");
                $consulta->execute(array($idCliente));
                $reCli = $consulta->fetch(PDO::FETCH_OBJ);

                try {
                    $consulta = $this->pdo->prepare("SELECT id FROM ordenreparacion ORDER BY id DESC LIMIT 1;");
                    $consulta->execute();
                    $reId = $consulta->fetch(PDO::FETCH_OBJ);
                } catch (Exception $ex) {
                    echo ($ex->getMessage());
                }

                $mensaje = '
                <html>
                <head>
                    <link rel="stylesheet" href="/assets/css/correo.css">
                    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                </head>
                <body>
                <div><h2>NETCOM SOLUCIONES INFORMATICAS</h2>
                <p>Gracias por su preferencia. A continuación están los detalles de su solicitud:</p>
                <p>CALLE 5 Y 6 AVENIDA 20 No. 2000</p><p>CP. 84270, COL. BUROCRATA / AGUA PRIETA, SONORA</p><p>Tel.: 6331219264</p><p>Tel.: 6336904160</p><p>contpaqi@netcomsoluciones.com</p><p>www.netcomsoluciones.com</p>
                <h2>ORDEN DE REPARACION</h2>
                <p>ORDEN No.: ' . $reId->id . '</p><p>Fecha: ' . $Taller->getFechaEntrada() . '</p><p>Asignado a: ' . $reTec->nombre . ' '. $reTec->apellido. '</p>
                <h3>INFORMACION DEL EQUIPO</h3>
                <ul><li>NS: ' . $Taller->getNs() . '</li><li>Marca: ' . $Taller->getMarca() . '</li><li>Modelo: ' . $Taller->getModelo() . '</li></ul>
                <p>Problemática: ' . $Taller->getObservaciones() . '</p>
                <p>Accesorios: ' . $Taller->getAccesorios() . '</p>
                <h3>Datos del cliente:</h3>
                <ul><li>Nombre de usuario: ' . $reCli->nombreCliente . ' ' . $reCli->apellidosC . '</li><li>Teléfono: ' . (string)$reCli->telefono . '</li><li>Correo: ' . $reCli->email . '</li></ul></div>
                
                </body>
                </html>';

                require_once "modelos/herramientas.php";
                $correoTec = new Correo();

                $correoTec->setFromEmail($reTec->email);
                $correoTec->setFromName($reTec->nombre);
                $correoTec->setMailSubject("Orden de reparacion No. " . $reId->id);
                $correoTec->setMessage($mensaje);
                $correoTec->setMailUsername("gion340@gmail.com");
                $correoTec->setMailUser("Netcom Soluciones Informaticas");
                $correoTec->setMailUserpassword("kxgoxrrwwzimxxui");
                $correoTec->setAddaddress($reTec->email);
                $correoTec->setTemplate("email_template.html");

                $this->modelo = new Correo;
                $this->modelo->sendemail($correoTec);


                require_once "modelos/herramientas.php";
                $correoCli = new Correo();
                $correoCli->setFromEmail($reCli->email);
                $correoCli->setFromName($reCli->nombreCliente);
                $correoCli->setMailSubject("Orden de reparacion No. " . $reId->id);
                $correoCli->setMessage($mensaje);
                $correoCli->setMailUsername("gion340@gmail.com");
                $correoCli->setMailUser("Netcom Soluciones Informaticas");
                $correoCli->setMailUserpassword("kxgoxrrwwzimxxui");
                $correoCli->setAddaddress($reCli->email);
                $correoCli->setTemplate("email_template.html");

                $this->modelo = new Correo;
                if ($reCli->email != null) {
                    $this->modelo->sendemail($correoCli);
                }
            } catch (Exception $e) {
                die($e->getMessage().' Ha ocurrido un error al enviar el mensaje:' [$mail->ErrorInfo]);
                
            }
        } catch (Exception $e) {
            die($e->getMessage().' Ha ocurrido un error al enviar el mensaje:' [$mail->ErrorInfo]);
        }
    }

    public function Actualizar(Taller $tallerSQL)
    {
        try {
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
            estadoEquipo=?,
            cobrado=?
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
                $tallerSQL->getCobrado(),
                $tallerSQL->getId()
            ));
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

    public function BuscarEnTabla($busqueda)
    {
        try {
            $not = "NOT LIKE";
            if (isset($_GET['filtro'])) {
                $not = "LIKE";
            }
            if (substr($busqueda, 0, 3) == 'idt' && ($numdigitos = strlen($busqueda) - 3) > 0) {
                $numdigitos = strlen($busqueda) - 3;
                $idbusqueda = (substr($busqueda, -$numdigitos));
                $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE tecnicoAsignado = $idbusqueda AND estadoEquipo $not '10';");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }
            if (substr($busqueda, 0, 3) == 'idc' && ($numdigitos = strlen($busqueda) - 3) > 0) {
                $numdigitos = strlen($busqueda) - 3;
                $idbusqueda = (substr($busqueda, -$numdigitos));
                $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion WHERE idCliente = $idbusqueda ORDER BY fechaPrometida, estadoEquipo, fechaEntrada;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }

            $columnas = ['id', 'idCliente', 'ns', 'marca', 'modelo', 'tipoEquipo', 'observaciones', 'accesorios', 'fechaEntrada', 'horaEntrada', 'fechaPrometida', 'tecnicoAsignado', 'estadoEquipo', 'cobrado'];
            if ($busqueda != null) {
                $where = "WHERE (";

                $cont = count($columnas);
                for ($i = 0; $i < $cont; $i++) {
                    $where .= $columnas[$i] . " LIKE '%" . $busqueda . "%' OR ";
                }
                $where = substr_replace($where, "", -3);
                $where .= ")";
            }

            $consulta = $this->pdo->prepare("SELECT * FROM ordenreparacion " . $where . " AND estadoEquipo $not '10';");

            //echo("SELECT * FROM ordenreparacion ".$where." AND estadoEquipo $not '10';");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $consulta = "DELETE FROM ordenreparacion WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        } catch (Exception $excepcion) {
            die($excepcion->getMessage());
        }
    }
    

}
