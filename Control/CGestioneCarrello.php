<?php

/**
 * CGestioneCarrello è la classe che si occupa della gestione dei carrelli e degli ordini, permettendo la comunicazione
 * fra le classi View, Entity e Foundation ad essi legate.
 * Class CGestioneCarrello
 * @access public
 * @package Controller
 */

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
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        $prodotto = $pm->load("FProdotto", $_POST['idProdotto']);
        $carrello = $gs->caricaCarrello();
        $carrello->aggiungiProdotto($prodotto, $_POST['quantita']);
        $gs->salvaCarrello($carrello);
        header("Location: ".$GLOBALS['path']."GestioneProdotti/recuperaDettagli/".$_POST['idProdotto']);
    }

    public static function modificaQuantita() {
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        $prodotto = $pm->load("FProdotto", $_POST['idProdotto']);
        $carrello = $gs->caricaCarrello();
        $carrello->modificaQuantita($prodotto, $_POST['quantita']);
        $gs->salvaCarrello($carrello);
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
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $telefono = $_POST['telefono'];

        $ordine = new EOrdine($carrello, $indirizzo);

        if ($_POST['buono'] != "") {
            $buono = $pm->load("FBuonoSconto", $_POST['buono']);
            $ordine->applicaBuono($buono);
            $pm->delete("FBuonoSconto", $_POST['buono']);
        }

        $carta->setAmmontare($carta->getAmmontare() - $ordine->getPrezzoTotale());
        $utente->setPunti($utente->getPunti() + ((int) $ordine->getPrezzoTotale()));          //aggiunge un punto per ogni euro speso

        CGestioneCarrello::mailOrdine($ordine, $nome, $cognome, $_POST['email']);

        $pm->store($ordine);
        $pm->update($carta);
        $pm->update($utente);

        foreach ($carrello->getProdotti() as $idProdotto => $quantita) {
            $prodotto = $pm->load("FProdotto", $idProdotto);
            $prodotto->setQuantita($prodotto->getQuantita() - $quantita);
            $pm->update($prodotto);
        }

        $gs->salvaCarrello(new ECarrello());      // Avvia un nuovo carrello vuoto in sessione

        $v = new VGestioneCarrello();
        $v->mostraOrdine($ordine, $nome, $cognome, $telefono);
    }

    private static function mailOrdine(EOrdine $ordine, string $nome, string $cognome, string $mailutente) {
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
            $mail->Body = $v->ordineEmail($ordine, $nome, $cognome, $mailutente);
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