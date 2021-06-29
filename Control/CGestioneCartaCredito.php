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
    public static function recuperaCarte() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $utente = $pm->load("FUtenteReg", $gs->caricaUtente()->getEmail());
            $carte = $pm->prelevaCarteUtente($utente->getEmail());
            $carteArr = array();
            foreach ($carte as $carta) {
                $tmp = array(
                    'numeroReale' => $carta->getNumero(),
                    'numero' => substr($carta->getNumero(), 0, 4)."************",
                    'titolare' => $carta->getTitolare(),
                    'circuito' => $carta->getCircuito(),
                    'cvv' => substr($carta->getCvv(), 0, 1)."**",
                    'ammontare' => $carta->getAmmontare(),
                    'scadenza' => $carta->getScadenza()->format("d-m-y"),
                );
                $carteArr[] = $tmp;
            }
            $v = new VGestioneCartaCredito();
            $v->mostraCarte($utente, $carteArr);
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Passa i dati inseriti dall'utente al package Foundation per salvare una nuova carta di credito ad esso associata.
     */
    public static function aggiungiCarta(): void {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $carta = new ECartaCredito($_POST['titolare'], $_POST['numero'], $_POST['circuito'], new DateTime($_POST['scadenza']),
                $_POST['cvv'], $_POST['ammontare']);
            $pm->salvaCartaUtente($carta, $gs->caricaUtente()->getEmail());

            header("Location: ".$GLOBALS['path']."GestioneCartaCredito/recuperaCarte");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Passa la scelta dell'utente al package Foundation, che si occupa poi di eliminare la carta di credito indicata.
     */
    public static function rimuoviCarta(): void {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $pm->eliminaCartaUtente($_POST['numero'], $gs->caricaUtente()->getEmail());
            header("Location: ".$GLOBALS['path']."GestioneCartaCredito/recuperaCarte");
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }
}