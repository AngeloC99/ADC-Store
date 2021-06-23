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

    public static function procediAcquisto(string $id, EIndirizzo $indirizzo) {

        // Prende i dati dalla POST e genera l'ordine!!!!!!!!!!!!!! LO salva poi sul DB

        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $id);

        $ordine = new EOrdine($carrello, $indirizzo);
        //$pm = FPersistentManager::getInstance();
        //$pm->store($ordine);
        $v = new VGestioneCarrello();
        $v->mostraOrdine($ordine);
        // manda la mail con i dettagli dell'ordine subito dopo aver premuto il tasto procedi con l'ordine
    }

    public static function recuperaCarrelliSalvati(EUtenteReg $utente) {
        $pm = FPersistentManager::getInstance();
        $carrelli = $pm->prelevaCarrelliUtente($utente);
        // Li mostra nel template
    }

    public static function salvaCarrello() {
        // prende il carrello dalla sessione e lo salva tramite il pm
    }
}