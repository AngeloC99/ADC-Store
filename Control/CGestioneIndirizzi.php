<?php

/**
 * La classe CGestioneIndirizzi gestisce le richieste legate agli indirizzi.
 * Class CGestioneIndirizzi
 * @access public
 * @package Control
 */

class CGestioneIndirizzi
{
    /**
     * Restituisce allo strato superiore View gli indirizzi di un utente.
     * @param EUtenteReg $utente
     * @return array
     */
    public static function recuperaIndirizzi(EUtenteReg $utente): array {
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaIndirizziUtente($utente);
    }


    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare un nuovo indirizzo predefinito ad esso
     * associato.
     * @param string $via
     * @param int $numero
     * @param string $cap
     * @param string $comune
     * @param string $provincia
     * @param EUtenteReg $utente
     */
    public static function aggiungiIndirizzo(string $via, int $numero, string $cap, string $comune, string $provincia, EUtenteReg $utente): void {
        $pm = FPersistentManager::getInstance();
        $indirizzo = new EIndirizzo($via,$numero,$comune,$provincia,$cap,true);
        $pm->salvaIndirizzoUtente($indirizzo, $utente);
    }

    /**
     * Passa la scelta dell'utente al package Foundation, che si occupa poi di eliminare l'indirizzo indicato.
     * @param EIndirizzo $indirizzo
     * @param EUtenteReg $utente
     */
    public static function rimuoviIndirizzo(EIndirizzo $indirizzo, EUtenteReg $utente): void {
        $pm = FPersistentManager::getInstance();
        $pm->eliminaIndirizzoUtente($indirizzo, $utente);
    }
}