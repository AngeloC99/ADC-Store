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
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     * @param EUtenteReg $utente
     * @return array
     */
    public static function recuperaIndirizzi() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $utente = $pm->load("FUtenteReg", $gs->caricaUtente()->getEmail());
            $indirizzi = $pm->prelevaIndirizziUtente($utente->getEmail());
            $indArr = array();
            foreach ($indirizzi as $indirizzo) {
                $tmp = array(
                    'via' => $indirizzo->getVia(),
                    'numero' => $indirizzo->getNumero(),
                    'cap' => $indirizzo->getCap(),
                    'comune' => $indirizzo->getComune(),
                    'provincia' => $indirizzo->getProvincia(),
                    'stringa' => str_replace(" ", "_", $indirizzo->getVia()).":".$indirizzo->getNumero().":".$indirizzo->getCap(),
                );
                $indArr[] = $tmp;
            }
            $v = new VGestioneIndirizzi();
            $v->mostraIndirizzi($utente, $indArr);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare un nuovo indirizzo ad esso
     * associato. Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function aggiungiIndirizzo(): void {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $indirizzo = new EIndirizzo(ucwords($_POST['via']),$_POST['numero'],ucwords($_POST['comune']),
                strtoupper($_POST['provincia']),$_POST['cap']);
            $pm->salvaIndirizzoUtente($indirizzo, $gs->caricaUtente()->getEmail());

            header("Location: ".$GLOBALS['path']."GestioneIndirizzi/recuperaIndirizzi");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Passa la scelta dell'utente al package Foundation, che si occupa poi di eliminare l'indirizzo indicato.
     * Se non si hanno i privilegi, si viene reindirizzati ad una pagina di errore.
     */
    public static function rimuoviIndirizzo(): void {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $pm->eliminaIndirizzoUtente($_POST['indirizzo'], $gs->caricaUtente()->getEmail());
            header("Location: ".$GLOBALS['path']."GestioneIndirizzi/recuperaIndirizzi");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }
}