<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\Exception.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\SMTP.php');

class CRegistrazione
{
    public static function registraUtente(string $nome,string $cognome,string $email,string $password){
        $utente=new EUtenteReg($nome,$cognome,$email,$password);
        FPersistentManager::getInstance()->store($utente);
    }


}