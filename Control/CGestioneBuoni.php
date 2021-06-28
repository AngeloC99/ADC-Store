<?php

use PHPMailer\PHPMailer\PHPMailer;

require('C:\Users\rommy\public_html\ADC-Store\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\rommy\public_html\ADC-Store\PHPMailer-master\src\Exception.php');
require('C:\Users\rommy\public_html\ADC-Store\PHPMailer-master\src\SMTP.php');

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

    public static function inviaBuono(): bool{
        $gs=CGestioneSessioni::getInstance();
        if ($gs->isLoggedAdmin()){
            $admin=$gs->caricaUtente();
        $buono=$admin->preparaBuono($_POST['percentuale'],$_POST['ammontare'],$_POST['email']);
        $buono->setCodice($_POST['codice']);
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
        $mail->Username = 'adcstore2021@gmail.com';  //qui va email dell'admin
        $mail->Password = 'plutopluto';  //qui va pw account gmail dell'admin
        $mail->SetFrom('adcstore2021@gmail.com');
        $mail->Subject = "ADC Store - BUONO SCONTO";
        $mail->AddAddress($_POST['email']);
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
        else{
            CGestioneSchermate::recupera401();
        }

    }
    public static function recuperaCreazioneBuono(){
        $v=new VGestioneBuoni();
        $v->mostraCreazioneBuono();
    }



}