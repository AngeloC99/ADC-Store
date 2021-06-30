<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\PHPMailer.php');
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\Exception.php');
require('C:\Users\angel\public_html\ADC-Store\PHPMailer-master\src\SMTP.php');

/**
 * CGestioneCarrello è la classe che si occupa della gestione dei carrelli e degli ordini, permettendo la comunicazione
 * fra le classi View, Entity e Foundation ad essi legate.
 * Class CGestioneCarrello
 * @access public
 * @package Controller
 */

class CGestioneCarrello
{
    /**
     * Metodo che permette il recupero del carrello di un utente nella sessione e che lo passa alla classe View responsabile
     * della sua visualizzazione. Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function recuperaCarrello() {
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        if($gs->isLoggedUser()){
            $carrello = $gs->caricaCarrello();
            $prodotti = $carrello->getProdotti();
            $arrProdotti = array();
            foreach ($prodotti as $idProd => $quantita) {
                $prod = $pm->load("FProdotto", $idProd);
                $img = $prod->getImmagine()->getByte();
                $mime = $prod->getImmagine()->getFormato();
                $tmp = array(
                    'id' => $prod->getId(),
                    'nome' => $prod->getNome(),
                    'prezzo' => $prod->getPrezzo(),
                    'quantitaTot' => $prod->getQuantita(),
                    'quantita' => $quantita,
                    'totProd' => $quantita*$prod->getPrezzo(),
                    'image' => $img,
                    'mime' => $mime
                );
                $arrProdotti[] = $tmp;
            }
            $v = new VGestioneCarrello();
            $v->mostraCarrello($carrello, $arrProdotti);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che permette ad un utente loggato di aggiungere un prodotto al carrello.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function aggiungiAlCarrello() {
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        if($gs->isLoggedUser()){
            $prodotto = $pm->load("FProdotto", $_POST['idProdotto']);
            $carrello = $gs->caricaCarrello();
            $carrello->aggiungiProdotto($prodotto, $_POST['quantita']);
            $gs->salvaCarrello($carrello);
            header("Location: ".$GLOBALS['path']."GestioneProdotti/recuperaDettagli/".$_POST['idProdotto']);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che permette ad un utente loggato di modificare la quantità di un prodotto nel carrello.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function modificaQuantita() {
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        if($gs->isLoggedUser()){
            $prodotto = $pm->load("FProdotto", $_POST['idProdotto']);
            $carrello = $gs->caricaCarrello();
            $carrello->modificaQuantita($prodotto, $_POST['quantita']);
            $gs->salvaCarrello($carrello);
            header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrello");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che consente ad un utente loggato di ordinare i prodotti nel carrello della sessione.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function procediOrdine() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $mailutente = $gs->caricaUtente()->getEmail();
            $carrello = $gs->caricaCarrello();
            $prodotti = $carrello->getProdotti();
            $arrProdotti = array();
            foreach ($prodotti as $idProd => $quantita) {
                $prod = $pm->load("FProdotto", $idProd);
                $tmp = array(
                    'nome' => $prod->getNome(),
                    'prezzo' => $prod->getPrezzo(),
                    'quantita' => $quantita,
                    'totProd' => $quantita*$prod->getPrezzo(),
                );
                $arrProdotti[] = $tmp;
            }
            $indirizzi = $pm->prelevaIndirizziUtente($mailutente);
            $arrIndirizzi = array();
            foreach ($indirizzi as $indirizzo) {
                $tmp = array(
                    'indirizzo' => $indirizzo,
                    'identificativo' => str_replace(" ", "_", $indirizzo->getVia()).":".$indirizzo->getNumero().":".$indirizzo->getCap(),
                );
                $arrIndirizzi[] = $tmp;
            }
            $carte = $pm->prelevaCarteUtente($mailutente);
            $arrCarte = array();
            foreach ($carte as $carta) {
                $tmp = array(
                    'carta' => $carta,
                    'numero' => $carta->getNumero(),
                );
                $arrCarte[] = $tmp;
            }
            $buoni = $pm->prelevaBuoni($mailutente);
            $arrBuoni = array();
            foreach ($buoni as $buono) {
                $tmp = array(
                    'buono' => $buono,
                    'codice' => $buono->getCodice(),
                );
                $arrBuoni[] = $tmp;
            }
            $v = new VGestioneCarrello();
            $v->compilaOrdine($carrello, $mailutente, $arrProdotti, $arrIndirizzi, $arrCarte, $arrBuoni);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che un utente evoca per procedere all'acquisto.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function procediAcquisto() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $carrello = $gs->caricaCarrello();
            $prodotti = $carrello->getProdotti();
            $arrProdotti = array();
            foreach ($prodotti as $idProd => $quantita) {
                $prod = $pm->load("FProdotto", $idProd);
                $tmp = array(
                    'nome' => $prod->getNome(),
                    'prezzo' => $prod->getPrezzo(),
                    'quantita' => $quantita,
                    'totProd' => $quantita*$prod->getPrezzo(),
                );
                $arrProdotti[] = $tmp;
            }
            $utente = $pm->load("FUtenteReg", $gs->caricaUtente()->getEmail());
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

            $pm->store($ordine);
            $pm->update($carta);
            $pm->update($utente);
            $gs->salvaUtente($utente);

            foreach ($carrello->getProdotti() as $idProdotto => $quantita) {
                $prodotto = $pm->load("FProdotto", $idProdotto);
                $prodotto->setQuantita($prodotto->getQuantita() - $quantita);
                $pm->update($prodotto);
            }

            $gs->salvaCarrello(new ECarrello());      // Avvia un nuovo carrello vuoto in sessione

            $v = new VGestioneCarrello();
            $v->mostraOrdine($ordine, $nome, $cognome, $telefono, $arrProdotti);
            CGestioneCarrello::mailOrdine($ordine, $nome, $cognome, $_POST['email'], $carrello, $arrProdotti);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo privato che notifica all'utente che procede all'acquisto il buon esito dell'operazione tramite l'invio di
     * una mail con i dettagli dell'ordine.
     * @param EOrdine $ordine
     * @param string $nome
     * @param string $cognome
     * @param string $mailutente
     */
    private static function mailOrdine(EOrdine $ordine, string $nome, string $cognome, string $mailutente, ECarrello $carrello, array $arrProdotti) {
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
            $mail->Body = $v->ordineEmail($ordine, $nome, $cognome, $carrello, $arrProdotti);
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    /**
     * Metodo che permette il recupero dei carrelli salvati in precedenza e che li passa alla classe View responsabile
     * della loro visualizzazione. Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function recuperaCarrelliSalvati() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $utente = $pm->load("FUtenteReg", $gs->caricaUtente()->getEmail());
            $carrelli = $pm->prelevaCarrelliUtente($utente->getEmail());
            $arrCarrelli = array();
            foreach ($carrelli as $carrello) {
                $tmp = array(
                    'idCarrello' => $carrello->getId(),
                    'nomeCarrello' => $carrello->getNome(),
                    'prezzoCarrello' => $carrello->getPrezzoTot(),
                );
                $arrProdotti = array();
                foreach ($carrello->getProdotti() as $idProd => $quantita) {
                    $prod = $pm->load("FProdotto", $idProd);
                    $tmp1 = array(
                        'nome' => $prod->getNome(),
                        'prezzo' => $prod->getPrezzo(),
                        'quantita' => $quantita,
                        'totProd' => $quantita*$prod->getPrezzo(),
                    );
                    $arrProdotti[] = $tmp1;
                }
                $tmp['prodotti'] = $arrProdotti;
                $arrCarrelli[] = $tmp;
            }
            $v = new VGestioneCarrello();
            $v->mostraCarrelliPreferiti($utente, $arrCarrelli);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che consente ad un utente loggato di salvare il carrello della sessione.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function salvaCarrello() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $carrello = $gs->caricaCarrello();
            $carrello->setNome($_POST['nomeCarrello']);
            $carrello->setId(uniqid('Car'));
            $pm->salvaCarrelloUtente($carrello, $gs->caricaUtente()->getEmail());

            header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrelliSalvati");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che consente ad un utente loggato di eliminare un carrello salvatp.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function eliminaCarrello() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $pm->eliminaCarrelloUtente($_POST['idCarrello']);
            header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrelliSalvati");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che consente ad un utente loggato di rievocare in sessione un carrello salvato in precedenza.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function rievocaCarrelloInSessione() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $carrello = $pm->load("FCarrello", $_POST['idCarrello']);
            $gs->salvaCarrello($carrello);

            header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrello");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }
}