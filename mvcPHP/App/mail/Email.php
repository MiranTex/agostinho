<?php

namespace App\mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends PHPMailer{


    public $data;
    public $files = null;

    public function __construct($data = null,$files = null) {
        $this->data = $data;
        $this->files = $files;

    }

    public function enviarEmail(){
        try {
            //Server settings
            // $this->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->isSMTP();                                            //Send using SMTP
            $this->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->Username   = 'arielmirantex@gmail.com';                     //SMTP username
            $this->Password   = 'manguiartur3217';                               //SMTP password
            $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $this->setFrom('bold', 'Mailer');
            $this->addAddress('arielmirantex@gmail.com', 'HAN');     //Add a recipient

            if($this->files){
                foreach ($this->files as $key => $file) {
                    if($file)
                    $this->addAttachment($file['target'],utf8_decode($file['name']));
                }
            }
        
            //Content
            $this->isHTML(true);                                  //Set email format to HTML
            $this->Subject = utf8_decode("Marcação de consulta");
            $this->Body    = $this->makeBody();
            $this->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            return $this->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
        }

    }

    private function makeBody(){
        $message = "<p><strong>Nome:</strong>".$this->data['name']."</p>";
        $message .= "<p><strong>Numero de documento:</strong>".$this->data['n_doc']."</p>"; 
        $message .= "<p><strong>Email:</strong>".$this->data['email']."</p>"; 
        $message .= "<p><strong>Morada:</strong>".$this->data['morada']."</p>";
        $message .= "<p><strong>Telefone:</strong>".$this->data['tel']."</p><br>"; 

        

        return $message;
    }

}