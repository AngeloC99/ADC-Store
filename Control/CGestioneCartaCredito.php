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
    public static function recuperaCarte(EUtenteReg $utente): array {

        //Passare l'utente non è necessario, lo si riconosce tramite il token della sessione

        // Recuperare tutte le carte del db non serve(?)

        $pm = FPersistentManager::getInstance();
        return $pm->prelevaCarteUtente($utente);
    }

    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare una nuova carta di credito ad esso associata.
     * @param string $titolare
     * @param string $numero
     * @param string $circuito
     * @param DateTime $scadenza
     * @param int $cvv
     * @param float $ammontare
     * @param EUtenteReg $utente
     */
    public static function aggiungiCarta(string $titolare, string $numero, string $circuito, DateTime $scadenza, int $cvv, float $ammontare, EUtenteReg $utente): void {

        // I DATI DEVONO ESSERE RECUPERATI DA UNA FORM CON IL METODO POST
        // L'AMMONTARE LO GENERIAMO RANDOM O SCELTO NELLA FORM???

        $pm = FPersistentManager::getInstance();
        $carta = new ECartaCredito($titolare, $numero, $circuito, $scadenza, $cvv, $ammontare);
        $pm->salvaCartaUtente($carta, $utente);
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