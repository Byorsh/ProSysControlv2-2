<?php

require_once "modelos/herramientas.php";

class HerramientasControlador
{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo = new Correo;
    }

    public function Inicio(){
        require_once "vistas/encabezado.php";
        require_once "vistas/herramientas/index.php";
        require_once "vistas/pie.php";
    }

    public function Guardar(){
        $correo = new Correo();

        $correo->setFromEmail($_POST['customer_email']);
        $correo->setFromName($_POST['customer_name']);
        $correo->setMailSubject($_POST['subject']);
        $correo->setMessage($_POST['message']);
        $correo->setMailUsername("gion340@gmail.com");
        $correo->setMailUser("Jorge B");
        $correo->setMailUserpassword("kxgoxrrwwzimxxui");
        $correo->setAddaddress($_POST['customer_email']);
        $correo->setTemplate("email_template.html");

        
        $this->modelo->sendemail($correo);
        header("home.php");
    }
}


/*Configuracion de variables para enviar el correo
$mail_username="";//Correo electronico saliente ejemplo: tucorreo@gmail.com
$mail_userpassword="";//Tu contraseña de gmail
$mail_addAddress="info@obedalvarado.pw";//correo electronico que recibira el mensaje
$template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje

/*Inicio captura de datos enviados por $_POST para enviar el correo 
$mail_setFromEmail=$_POST['customer_email'];
$mail_setFromName=$_POST['customer_name'];
$txt_message=$_POST['message'];
$mail_subject=$_POST['subject'];*/