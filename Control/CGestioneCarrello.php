<?php


class CGestioneCarrello
{
    public static function recuperaCarrello(string $id) {
        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $id);
        $v = new VGestioneCarrello();
        $v->mostraCarrello($carrello);
    }

    public static function aggiungiAlCarrello() {
        // Con le sessioni
    }

    public static function modificaQuantita() {

    }

    public static function procediOrdine(string $id, string $email) {
        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $id);
        $utente = $pm->load("FUtenteReg", $email);
        $v = new VGestioneCarrello();
        $v->compilaOrdine($carrello, $utente);
    }

    public static function procediAcquisto(string $idCarrello, EIndirizzo $indirizzo, string $mailutente, string $numerocarta, string $codiceBuono = null) {

        // Prende i dati dalla POST e genera l'ordine!!!!!!!!!!!!!! LO salva poi sul DB

        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $idCarrello);
        $utente = $pm->load("FUtenteReg", $mailutente);
        $carta = $pm->load("FCartaCredito", $numerocarta);

        $ordine = new EOrdine($carrello, $indirizzo);
        /**
        if ($codiceBuono) {
            $buono = $pm->load("FBuonoSconto", $codiceBuono);
            $ordine->applicaBuono($buono);
            $pm->delete("FBuonoSconto", $codiceBuono);
        }
         */
        $carta->setAmmontare($carta->getAmmontare() - $ordine->getPrezzoTotale());
        $utente->setPunti($utente->getPunti() + ((int) $ordine->getPrezzoTotale()));          //aggiunge un punto per ogni euro speso
        //$pm->store($ordine);
        //$pm->update($carta);
        //$pm->update($utente);

        $v = new VGestioneCarrello();
        $v->mostraOrdine($ordine, $utente);
        // manda la mail con i dettagli dell'ordine subito dopo aver premuto il tasto procedi con l'ordine
    }

    public static function recuperaCarrelliSalvati(string $mailutente) {
        $pm = FPersistentManager::getInstance();
        $utente = $pm->load("FUtenteReg", $mailutente);
        $carrelli = $pm->prelevaCarrelliUtente($utente);
        // Li mostra nel template
    }

    public static function salvaCarrello() {
        // prende il carrello dalla sessione e lo salva tramite il pm
    }
}