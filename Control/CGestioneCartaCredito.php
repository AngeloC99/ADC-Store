<?php

/**
 * La classe CGestioneCartaCredito gestisce le richieste legate alle carte di credito.
 * Class CGestioneCartaCredito
 * @access public
 * @package Control
 */

class CGestioneCartaCredito
{
    /**
     * Restituisce allo strato superiore View le carte di credito di un utente.
     * @param EUtenteReg $utente
     * @return array
     */
    public static function recuperaCarte(string $mailutente="adarossi@gmail.com") {
        $pm = FPersistentManager::getInstance();
        $utente = $pm->load("FUtenteReg", $mailutente);
        $v = new VGestioneCartaCredito();
        $v->mostraCarte($utente);
    }

    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare una nuova carta di credito ad esso associata.
     */
    public static function aggiungiCarta(): void {
        $pm = FPersistentManager::getInstance();
        $carta = new ECartaCredito($_POST['titolare'], $_POST['numero'], $_POST['circuito'], new DateTime($_POST['scadenza']),
                                    $_POST['cvv'], $_POST['ammontare']);

        // MODIFICARE CON MAIL UTENTE SESSIONE

        $utente = $pm->load("FUtenteReg", "adarossi@gmail.com");
        $pm->salvaCartaUtente($carta, $utente);
        header("Location: ".$GLOBALS['path']."GestioneCartaCredito/recuperaCarte");
    }

    /**
     * Passa la scelta dell'utente al package Foundation, che si occupa poi di eliminare la carta di credito indicata.
     * @param string $numero
     */
    public static function rimuoviCarta(string $numero): void {
        $pm = FPersistentManager::getInstance();
        $utente = $pm->load("FUtenteReg", "adarossi@gmail.com");
        $pm->eliminaCartaUtente($numero, $utente);
        header("Location: ".$GLOBALS['path']."GestioneCartaCredito/recuperaCarte");
    }
}