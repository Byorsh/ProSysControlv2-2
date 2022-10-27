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
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    /*public function Total(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(precio) AS Total FROM videojuegos;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }*/

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM usuario;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($nombre){
        try{
            $consulta = $this ->pdo ->prepare("SELECT * FROM usuario WHERE id=?;");
            $consulta->execute(array($nombre));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $u=new Usuario();

            $u->setRfc($r->rfc);
            $u->setNombre($r->nombre);
            $u->setApellido($r->apellido);
            $u->setTelefono($r->telefono);
            $u->setEmail($r->email);
            $u->setUser($r->user);
            $u->setContrasenia($r->contrasenia);
            $u->setPrivilegio($r->privilegio);

            return $u;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Usuario $u){
        try{
            $consulta = "INSERT INTO usuario(rfc, nombre, apellido, telefono, email, user, contrasenia, privilegio) 
            VALUES (?,?,?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)->execute(array(
                $u->getRfc(),
                $u->getNombre(),
                $u->getApellido(),
                $u->getTelefono(),
                $u->getEmail(),
                $u->getUser(),
                $u->getContrasenia(),
                $u->getPrivilegio()
            ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Usuario $u){
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
                $u->getRfc(),
                $u->getNombre(),
                $u->getApellido(),
                $u->getTelefono(),
                $u->getEmail(),
                $u->getUser(),
                $u->getContrasenia(),
                $u->getPrivilegio(),
                $u->getId()
            ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM usuario WHERE id=?;";
            $this->pdo->prepare($consulta)->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}