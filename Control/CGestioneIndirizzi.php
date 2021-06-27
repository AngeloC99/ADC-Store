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
    public static function recuperaIndirizzi() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        $utente = $pm->load("FUtenteReg", $gs->caricaUtente()->getEmail());
        $v = new VGestioneIndirizzi();
        $v->mostraIndirizzi($utente);
    }


    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare un nuovo indirizzo predefinito ad esso
     * associato.
     */
    public static function aggiungiIndirizzo(): void {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();

        $indirizzo = new EIndirizzo(ucwords($_POST['via']),$_POST['numero'],ucwords($_POST['comune']),
                                    strtoupper($_POST['provincia']),$_POST['cap'],false);
        $pm->salvaIndirizzoUtente($indirizzo, $gs->caricaUtente()->getEmail());

        header("Location: ".$GLOBALS['path']."GestioneIndirizzi/recuperaIndirizzi");
    }

    /**
     * Passa la scelta dell'utente al package Foundation, che si occupa poi di eliminare l'indirizzo indicato.
     * @param string $indirizzo
     */
    public static function rimuoviIndirizzo(string $indirizzo): void {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();

        $pm->eliminaIndirizzoUtente($indirizzo, $gs->caricaUtente()->getEmail());

        header("Location: ".$GLOBALS['path']."GestioneIndirizzi/recuperaIndirizzi");
    }
}