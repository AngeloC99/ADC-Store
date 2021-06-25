<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\Exception.php');
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\SMTP.php');



class CGestioneCarrello
{
    public static function recuperaCarrello(string $id) {
        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $id);
        $v = new VGestioneCarrello();
        $v->mostraCarrello($carrello);
    }

    public static function aggiungiAlCarrello() {
        // Con le sessioni
    }

    public static function modificaQuantita() {

    }

    public static function procediOrdine(string $id, string $email) {
        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $id);
        $utente = $pm->load("FUtenteReg", $email);
        $v = new VGestioneCarrello();
        $v->compilaOrdine($carrello, $utente);
    }

    public static function procediAcquisto(string $idCarrello, EIndirizzo $indirizzo, string $mailutente, string $numerocarta, string $codiceBuono = null) {

        // Prende i dati dalla POST e genera l'ordine!!!!!!!!!!!!!! LO salva poi sul DB

        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $idCarrello);
        $utente = $pm->load("FUtenteReg", $mailutente);
        $carta = $pm->load("FCartaCredito", $numerocarta);

        $ordine = new EOrdine($carrello, $indirizzo);
        /**
        if ($codiceBuono) {
            $buono = $pm->load("FBuonoSconto", $codiceBuono);
            $ordine->applicaBuono($buono);
            $pm->delete("FBuonoSconto", $codiceBuono);
        }
         */
        $carta->setAmmontare($carta->getAmmontare() - $ordine->getPrezzoTotale());
        $utente->setPunti($utente->getPunti() + ((int) $ordine->getPrezzoTotale()));          //aggiunge un punto per ogni euro speso

        // MANDARE MAIL
        //CGestioneCarrello::mailOrdine($ordine, $mailutente, $utente);
        //CGestioneCarrello::mailOrdine($ordine, "mailutente@gmail.com", $utente); // <------------------------

        //$pm->store($ordine);
        //$pm->update($carta);
        //$pm->update($utente);

        $v = new VGestioneCarrello();
        $v->mostraOrdine($ordine, $utente);
    }

    private static function mailOrdine(EOrdine $ordine, string $mailutente, EUtenteReg $utente) {
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $mail->IsSMTP();
            $mail->SMTPDebug = 0;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ));
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->Username = 'adcstore2021@gmail.com';
            $mail->Password = 'plutopluto';
            $mail->SetFrom('adcstore@gmail.com');
            $mail->Subject = "ADC Store - Conferma dell'ordine!";
            $mail->AddAddress($mailutente);

            $v = new VGestioneCarrello();
            $mail->Body = $v->ordineEmail($ordine, $utente);
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public static function recuperaCarrelliSalvati(string $mailutente) {
        $pm = FPersistentManager::getInstance();
        $utente = $pm->load("FUtenteReg", $mailutente);
        $v = new VGestioneCarrello();
        $v->mostraCarrelliPreferiti($utente);
    }

    public static function salvaCarrello() {
        // prende il carrello dalla sessione e lo salva tramite il pm

        //$pm = FPersistentManager::getInstance();
        //$pm->store($carrello)
    }
}