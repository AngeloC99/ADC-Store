<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\Exception.php');
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\SMTP.php');



class CGestioneCarrello
{
    public static function recuperaCarrello() {
        $gs = CGestioneSessioni::getInstance();
        $carrello = $gs->caricaCarrello();
        $v = new VGestioneCarrello();
        $v->mostraCarrello($carrello);
    }

    public static function aggiungiAlCarrello() {
        // Con le sessioni
    }

    public static function modificaQuantita() {


        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrello");
    }

    public static function procediOrdine() {
        $gs = CGestioneSessioni::getInstance();
        $carrello = $gs->caricaCarrello();
        $v = new VGestioneCarrello();
        $v->compilaOrdine($carrello, $gs->caricaUtente()->getEmail());
    }

    public static function procediAcquisto() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        $carrello = $gs->caricaCarrello();
        $utente = $gs->caricaUtente();
        $carta = $pm->load("FCartaCredito", $_POST['carta']);
        $indArray = explode(":", $_POST['indirizzo']);
        $via = str_replace("_", " ", $indArray[0]);
        $numero = (int) $indArray[1];
        $cap = $indArray[2];
        $indirizzo = $pm->load("FIndirizzo", $via, $numero, $cap);
        $telefono = $_POST['telefono'];

        $ordine = new EOrdine($carrello, $indirizzo);

        if ($_POST['buono'] != "") {
            $buono = $pm->load("FBuonoSconto", $_POST['buono']);
            $ordine->applicaBuono($buono);
            $pm->delete("FBuonoSconto", $_POST['buono']);
        }

        $carta->setAmmontare($carta->getAmmontare() - $ordine->getPrezzoTotale());
        $utente->setPunti($utente->getPunti() + ((int) $ordine->getPrezzoTotale()));          //aggiunge un punto per ogni euro speso

        // MANDARE MAIL
        //CGestioneCarrello::mailOrdine($ordine, $utente);   <------------------------

        //$pm->store($ordine);     <---------- Scommentare quando implementato il carrello della sessione
        $pm->update($carta);
        $pm->update($utente);

        $gs->salvaCarrello(new ECarrello());      // Avvia un nuovo carrello vuoto in sessione

        $v = new VGestioneCarrello();
        $v->mostraOrdine($ordine, $utente, $telefono);
    }

    private static function mailOrdine(EOrdine $ordine, EUtenteReg $utente) {
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
            $mail->AddAddress($utente->getEmail());

            $v = new VGestioneCarrello();
            $mail->Body = $v->ordineEmail($ordine, $utente);
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public static function recuperaCarrelliSalvati() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();

        $utente = $pm->load("FUtenteReg", $gs->caricaUtente()->getEmail());

        $v = new VGestioneCarrello();
        $v->mostraCarrelliPreferiti($utente);
    }

    public static function salvaCarrello() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();

        $carrello = $gs->caricaCarrello();

        $carrello->setNome($_POST['nomeCarrello']);
        $carrello->setId(uniqid('Car'));

        $pm->salvaCarrelloUtente($carrello, $gs->caricaUtente()->getEmail());

        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrelliSalvati");
    }

    public static function eliminaCarrello(string $idCarrello) {
        $pm = FPersistentManager::getInstance();
        $pm->eliminaCarrelloUtente($idCarrello);

        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrelliSalvati");
    }

    public static function rievocaCarrelloInSessione(string $idCarrello) {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();

        $carrello = $pm->load("FCarrello", $idCarrello);
        $gs->salvaCarrello($carrello);

        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrello");
    }
}