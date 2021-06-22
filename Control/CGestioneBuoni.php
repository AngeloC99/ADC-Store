<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\Exception.php');
require('C:\Users\rommy\OneDrive\Desktop\CORSI 3.2\Programmazione Web\PROGETTO ESAME\PHP\PHPMailer-master\src\SMTP.php');

class CGestioneBuoni
{

    public static function recuperaBuoni(EUtenteReg $utente){
        $email=$utente->getEmail();
        $pm = FPersistentManager::getInstance();
        $buoniUtente=$pm->prelevaBuoni($email);
        $buoni=array();
        foreach ($buoniUtente as $key=>$item){
            $buono=$pm->load('FBuonoSconto',$key);
            if ($buono->isPercentuale()) {
                $el = array(
                    'codice' => $buono->getCodice(),
                    'ammontare' => "-" . $buono->getAmmontare() . "%",
                    'scadenza' => date_format($buono->getScadenza(), 'd-m-Y')
                );
            }
            else{
                $el = array(
                    'codice' => $buono->getCodice(),
                    'ammontare' => "-" . $buono->getAmmontare() . "€",
                    'scadenza' => date_format($buono->getScadenza(), 'd-m-Y')
                );

            }
            $buoni[]=$el;
            }

        $v=new VGestioneBuoni();
        $v->mostraBuoni($buoni,$utente);

    }

    public static function inviaBuono(EAmministratore $admin,string $codice,string $perc,int $ammontare, string $messaggio,string $email): bool{
        if ($perc=='Percentuale'){
            $percentuale=true;
        }
        else{
            $percentuale=false;
        }
        $buono=$admin->preparaBuono($percentuale,$ammontare,$messaggio);
        $buono->setCodice($codice);
        $mail = new PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0;
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
        $mail->Username = $admin->getEmail();  //qui va email dell'admin
        $mail->Password = $admin->getPwemail();  //qui va pw account gmail dell'admin
        $mail->SetFrom($email);
        $mail->Subject = "ADC Store - BUONO SCONTO";
        $mail->AddAddress($email);
        //setta i valori del buono nell'email ...ancora da risolvere per l'immagine
        $v=new VGestioneBuoni();
        $mail->Body = $v->datiBsEmail($buono);
        $v->mostraCreazioneBuono();
        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }

    }



}