<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Correo{

    private $mail_username;
    private $mail_userpassword;
    private $mail_setFromEmail;
    private $mail_setFromName;
    private $mail_addAddress;
    private $txt_message;
    private $mail_subject;
    private $template;

    public function getMailUsername() : ?string{
        return $this->mail_username;
    }

    public function setMailUsername(string $mail_username){
        $this->mail_username = $mail_username;
    }

    public function getMailUserpassword() : ?string{
        return $this->mail_userpassword;
    }

    public function setMailUserpassword(string $mail_userpassword){
        $this->mail_userpassword = $mail_userpassword;
    }

    public function getFromEmail() : ?string{
        return $this->mail_setFromEmail;
    }

    public function setFromEmail(string $mail_setFromEmail){
        $this->mail_setFromEmail = $mail_setFromEmail;
    }

    public function getFromName() : ?string{
        return $this->mail_setFromName;
    }

    public function setFromName(string $mail_setFromName){
        $this->mail_setFromName = $mail_setFromName;
    }

    public function getAddaddress() : ?string{
        return $this->mail_addAddress;
    }

    public function setAddaddress(string $mail_addAddress){
        $this->mail_addAddress = $mail_addAddress;
    }

    public function getMessage() : ?string{
        return $this->txt_message;
    }

    public function setMessage(string $txt_message){
        $this->txt_message = $txt_message;
    }

    public function getMailsubject() : ?string{
        return $this->mail_subject;
    }

    public function setMailSubject(string $mail_subject){
        $this->mail_subject = $mail_subject;
    }

    public function getTemplate() : ?string{
        return $this->template;
    }

    public function setTemplate(string $template){
        $this->template = $template;
    }

    public function sendemail(Correo $correo){
        require 'assets/PHPMailer/PHPMailer.php';
        require 'assets/PHPMailer/Exception.php';
        require 'assets/PHPMailer/SMTP.php';
        
        $mail = new PHPMailer(true);

        try{
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true; 
            $mail->Username = $correo->getMailUsername();
            $mail->Password = $correo->getMailUserpassword();
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 587;

            //Datos del correo

            $mail->setFrom($correo->getMailUsername(), 'Jorge Barraza');
            $mail->addAddress($correo->getFromEmail(), $correo->getFromName());
            $mail->addReplyTo($correo->getMailUsername(), 'Jorge Barraza');

            //Contenido del correo

            $mail->isHTML(true);
            $mail->Subject = $correo->getMailsubject();
            $mail->Body = $correo->getMessage();
            $mail->AltBody = $correo->getMessage();

            $mail->send();
            echo 'El mensaje se ha enviado correctamente';

        } catch (Exception $e){
            echo "Ha ocurrido un error al enviar el mensaje: {$mail->ErrorInfo}";
        }
        
        
    }
}

?>