<?php

use PHPMailer\PHPMailer\PHPMailer;

require('C:\Users\david\public_html\ADC-Store\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\david\public_html\ADC-Store\PHPMailer-master\src\Exception.php');
require('C:\Users\david\public_html\ADC-Store\PHPMailer-master\src\SMTP.php');

class CGestioneBuoni
{

    public static function recuperaBuoni(){
        $gs=CGestioneSessioni::getInstance();
        if ($gs->isLoggedUser()) {
            $utente=$gs->caricaUtente();
            $email = $utente->getEmail();
            $pm = FPersistentManager::getInstance();
            $buoniUtente = $pm->prelevaBuoni($email);
            $buoni = array();
            foreach ($buoniUtente as $key => $item) {
                if ($item->isPercentuale()) {
                    $el = array(
                        'codice' => $item->getCodice(),
                        'ammontare' => "-" . $item->getAmmontare() . "%",
                        'scadenza' => date_format($item->getScadenza(), 'd-m-Y')
                    );
                } else {
                    $el = array(
                        'codice' => $item->getCodice(),
                        'ammontare' => "-" . $item->getAmmontare() . "€",
                        'scadenza' => date_format($item->getScadenza(), 'd-m-Y')
                    );

                }
                $buoni[] = $el;
            }
            $v = new VGestioneBuoni();
            $v->mostraBuoni($buoni, $utente);
        }
        else {
            CGestioneSchermate::recupera401();
        }

    }

    public static function inviaBuono(){
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
        $pm=FPersistentManager::getInstance();
        $pm->store($buono,$_POST['email']);
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