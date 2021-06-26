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
    public static function recuperaCarte(string $mailutente) {
        $pm = FPersistentManager::getInstance();
        $utente = $pm->load("FUtenteReg", $mailutente);
        $v = new VGestioneCartaCredito();
        $v->mostraCarte($utente);
    }

    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare una nuova carta di credito ad esso associata.
     * @param string $mailutente
     */
    public static function aggiungiCarta(): void {
        $pm = FPersistentManager::getInstance();
        $carta = new ECartaCredito($_POST['titolare'], $_POST['numero'], $_POST['circuito'], new DateTime($_POST['scadenza']),
                                    $_POST['cvv'], $_POST['ammontare']);
        // MODIFICARE CON MAIL UTENTE SESSIONE

        $utente = $pm->load("FUtenteReg", "adarossi@gmail.com");
        $pm->salvaCartaUtente($carta, $utente);
        CGestioneCartaCredito::recuperaCarte("adarossi@gmail.com");
    }

    /**
     * Passa la scelta dell'utente al package Foundation, che si occupa poi di eliminare la carta di credito indicata.
     * @param ECartaCredito $carta
     * @param EUtenteReg $utente
     */
    public static function rimuoviCarta(ECartaCredito $carta, EUtenteReg $utente): void {
        $pm = FPersistentManager::getInstance();
        $pm->eliminaCartaUtente($carta, $utente);
    }
}