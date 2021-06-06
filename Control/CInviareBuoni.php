<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\Exception.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\SMTP.php');

class CInviareBuoni
{
    public static function recuperaClienti(): array{
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaUtentiInattivi();
    }

    public static function selezionaCliente(string $email): EUtenteReg {
        //$array=self::recuperaClienti();
        //return $array[$email];
        $pm = FPersistentManager::getInstance();
        return $pm->load("FUtenteReg",$email);
    }

    //public static function inviaBuono(bool $p,int $a,string $m='',EUtenteReg $utente){
       // $admin; //come facciamo, lo istanziamo qui o se ne occupa CAdmin??
       // $buono=$admin->preparaBuono($p,$a,$m,$utente);  //come lo inviamo all'utente??
     public static function invia(): bool{
            $mail = new PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "la vostra email";
            $mail->Password = "la vostra password";
            $mail->SetFrom("sempre la vostra email");
            $mail->Subject = "BUONO SCONTO";
            $mail->Body = "Questo è un regalo solo per te!";
            $mail->AddAddress("email destinatario");
            $mail->msgHTML(file_get_contents( 'C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\Smarty\smarty-dir\templates\email-temp.html'));
            if(!$mail->Send()) {
                return false;
            } else {
                return true;
            }

        }


}