<?php

class Usuario{
    private $udo;

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

    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT COUNT(id) AS CantidadUsuario FROM usuario;");
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
            contrasenia=?,
            privilegio=?
            WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array(
                $usuarioSQL->getRfc(),
                $usuarioSQL->getNombre(),
                $usuarioSQL->getApellido(),
                $usuarioSQL->getTelefono(),
                $usuarioSQL->getEmail(),
                $usuarioSQL->getUser(),
                $usuarioSQL->getContrasenia(),
                $usuarioSQL->getPrivilegio(),
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