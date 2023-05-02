<?php

class Usuario{
    private $pdo;

    private $id;
    private $rfc;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $user;
    private $contrasenia;
    private $privilegio;
    

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

    public function getApellido() : ? string{
        return $this->apellido;
    }

    public function setApellido(string $apellido){
        $this->apellido = $apellido;
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

    public function getUser() : ?string{
        return $this->user;
    }

    public function setUser(string $user){
        $this->user = $user;
    }

    public function getContrasenia() : ?string{
        return $this->contrasenia;
    }

    public function setContrasenia(string $contrasenia){
        $this->contrasenia = $contrasenia;
    }

    public function getPrivilegio() : ?int{
        return $this->privilegio;
    }

    public function setPrivilegio(int $privilegio){
        $this->privilegio = $privilegio;
    }
    public function verificarAtributos(Usuario $usuarioSQL){
        /*Como estaba
        if($usuarioSQL->getPrivilegio()==null){return true;}
        if($usuarioSQL->getNombre()==null){return true;}*/
        //$valorBoleano = false;

        //if($usuarioSQL->getPrivilegio()==null){return true;}
        if($usuarioSQL->getNombre()!=null||$usuarioSQL->getPrivilegio()!=null||
        $usuarioSQL->getApellido()!=null||$usuarioSQL->getTelefono()!=null||
        $usuarioSQL->getContrasenia()!=null||$usuarioSQL->getUser()!=null||
        $usuarioSQL->getEmail()!=null
        ){return true;}
        else{
            return false;
        }
        //return $valorBoleano
    }

    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS CantidadUsuario FROM usuario;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function CantidadDeEquiposAsignados($idtec){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS CantidadEquipos FROM ordenreparacion WHERE tecnicoAsignado = $idtec AND estadoEquipo NOT LIKE 10;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function CantidadServicios(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS CantidadServicios FROM domicilio WHERE costoTotal LIKE 0;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function CantidadEquiposEnEspera(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS CantidadEquiposEnEspera FROM ordenreparacion WHERE estadoEquipo NOT LIKE 10 ;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM usuario;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Obtener($nombre){
        try{
            $consulta = $this ->pdo ->prepare("SELECT * FROM usuario WHERE id=?;");
            $consulta->execute(array($nombre));
            $reUsuario=$consulta->fetch(PDO::FETCH_OBJ);
            $usuarioSQL=new Usuario();

            $usuarioSQL->setId($reUsuario->id);
            $usuarioSQL->setRfc($reUsuario->rfc);
            $usuarioSQL->setNombre($reUsuario->nombre);
            $usuarioSQL->setApellido($reUsuario->apellido);
            $usuarioSQL->setTelefono($reUsuario->telefono);
            $usuarioSQL->setEmail($reUsuario->email);
            $usuarioSQL->setUser($reUsuario->user);
            $usuarioSQL->setContrasenia($reUsuario->contrasenia);
            $usuarioSQL->setPrivilegio($reUsuario->privilegio);

            return $usuarioSQL;
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Insertar(Usuario $usuarioSQL){
        try{
            $consulta = "INSERT INTO usuario(rfc, nombre, apellido, telefono, email, user, contrasenia, privilegio) 
            VALUES (?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $usuarioSQL->getRfc(),
                $usuarioSQL->getNombre(),
                $usuarioSQL->getApellido(),
                $usuarioSQL->getTelefono(),
                $usuarioSQL->getEmail(),
                $usuarioSQL->getUser(),
                $usuarioSQL->getContrasenia(),
                $usuarioSQL->getPrivilegio()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Actualizar(Usuario $usuarioSQL){
        try{
            $consulta = "UPDATE usuario SET
            rfc=?,
            nombre=?,
            apellido=?,
            telefono=?,
            email=?,
            user=?,
            privilegio=?
            WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $usuarioSQL->getRfc(),
                $usuarioSQL->getNombre(),
                $usuarioSQL->getApellido(),
                $usuarioSQL->getTelefono(),
                $usuarioSQL->getEmail(),
                $usuarioSQL->getUser(),
                $usuarioSQL->getPrivilegio(),
                $usuarioSQL->getId()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
    public function Actualizarcontraseña(Usuario $usuarioSQL){
        try{
            $consulta = "UPDATE usuario SET
            contrasenia=?
            WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $usuarioSQL->getContrasenia(),
                $usuarioSQL->getId()
            ));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM usuario WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        }catch(Exception $excepcion){
            die($excepcion->getMessage());
        }
    }
}