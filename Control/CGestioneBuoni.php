<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\Exception.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\SMTP.php');

class CGestioneBuoni
{

    public static function recuperaBuoni(){
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaBuoni();
    }

    //public static function inviaBuono(bool $p,int $a,string $m='',EUtenteReg $utente){
    // $admin; //come facciamo, lo istanziamo qui o se ne occupa CAdmin??
    // $buono=$admin->preparaBuono($p,$a,$m,$utente);  //come lo inviamo all'utente??
    public static function inviaBuono(EAmministratore $admin,bool $percentuale,int $ammontare, string $messaggio,EUtenteReg $utente): bool{
        $buono=$admin->preparaBuono($percentuale,$ammontare,$messaggio);
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
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->Username = "xxx";  //qui va email dell'admin
        $mail->Password = "xxx";  //qui va pw account gmail dell'admin
        $mail->SetFrom("xxx");
        $mail->Subject = "ADC Store - BUONO SCONTO";
        $mail->AddAddress($utente->getEmail());
        //setta i valori del buono nell'email ...ancora da risolvere
        $v=new VGestioneBuoni();
        $mail->Body = $v->datiBsEmail($buono);
        //$mail->msgHTML($v->datiBsEmail($buono));
        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }

    }
    public static function preparaBuonoPerInvio(EAmministratore $admin,bool $percentuale,int $ammontare, string $messaggio): EBuonoSconto{
        return $admin->preparaBuono($percentuale,$ammontare,$messaggio);

    }



}