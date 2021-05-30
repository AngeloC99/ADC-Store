<?php

/**
 * La classe FPersistentManager si presenta come interfaccia fra le classi del package Foundation e le classi Controller che la interrogano per effettuare le operazioni CRUD sul database.
 * Class FPersistentManager
 * @access public
 */

class FPersistentManager
{
    /**
     * FPersistentManager constructor.
     */
    public function __construct() {}

    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata n-upla in una tabella del database.
     * @param string $Fclass
     * @param $key1
     * @param null $key2
     * @param null $key3
     * @return bool
     */
    public function exist(string $Fclass, $key1, $key2=null, $key3=null) : bool {
        $ris = $Fclass::exist($key1,$key2,$key3);
        return $ris;
    }

    /**
     * Carica in RAM un'istanza dell'oggetto corrispondente alla n-upla individuata dalla chiave primaria fornita.
     * @param string $Fclass
     * @param $key1
     * @param null $key2
     * @param null $key3
     * @return object
     */
    public function load(string $Fclass, $key1, $key2=null, $key3=null) : object{
        $object=$Fclass::load($key1,$key2,$key3);
        return $object;
    }

    /**
     * Salva un oggetto nell'apposita tabella del database.
     * @param object $obj
     * @param null $mailutente
     * @return bool
     */
    public function store(object $obj,$mailutente=null) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::store($obj,$mailutente);
        return $ris;
    }

    /**
     * Aggiorna i valori di una n-upla in una tabella del database con quelli dell'oggetto passato come argomento.
     * @param object $obj
     * @return bool
     */
    public function update(object $obj) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::update($obj);
        return $ris;
    }

    /**
     * Elimina la n-upla individuata dalla chiave primaria fornita dalla tabella corrispondente nel database.
     * @param string $Fclass
     * @param $key1
     * @param null $key2
     * @param null $key3
     * @return bool
     */
    public function delete(string $Fclass, $key1, $key2=null, $key3=null) : bool {
        $ris = $Fclass::delete($key1,$key2,$key3);
        return $ris;
    }

    /**
     * Preleva tutti gli utenti presenti nell'omonima tabella del database.
     * @return array
     */
    public function prelevaUtenti() : array {
        return FUtenteReg::prelevaUtenti();
    }

    /**
     * Salva un'indirizzo fornito da un utente nel database.
     * @param EIndirizzo $indirizzo
     * @param EUtenteReg $utente
     * @return bool
     */
    public function salvaIndirizzoUtente(EIndirizzo $indirizzo, EUtenteReg $utente) : bool {
        return FUtenteReg::salvaIndirizzo($indirizzo, $utente->getEmail());
    }

    /**
     * Elimina un'indirizzo fornito da un utente dal database.
     * @param EIndirizzo $indirizzo
     * @param EUtenteReg $utente
     * @return bool
     */
    public function eliminaIndirizzoUtente(EIndirizzo $indirizzo, EUtenteReg $utente) : bool {
        return FUtenteReg::eliminaIndirizzo($indirizzo->getVia(), $indirizzo->getNumero(), $indirizzo->getCap(), $utente->getEmail());
    }

    /**
     * Preleva tutti gli indirizzi appartenenti ad un utente nel database.
     * @param EUtenteReg $utente
     * @return array
     */
    public function prelevaIndirizziUtente(EUtenteReg $utente) : array {
        return FUtenteReg::prelevaIndirizzi($utente->getEmail());
    }

    /**
     * Salva una carta di credito fornita da un utente nel database.
     * @param ECartaCredito $carta
     * @param EUtenteReg $utente
     * @return bool
     */
    public function salvaCartaUtente(ECartaCredito $carta, EUtenteReg $utente) : bool {
        return FUtenteReg::salvaCarta($carta, $utente->getEmail());
    }

    /**
     * Elimina una carta di credito fornita da un utente dal database.
     * @param ECartaCredito $carta
     * @param EUtenteReg $utente
     * @return bool
     */
    public function eliminaCartaUtente(ECartaCredito $carta, EUtenteReg $utente) : bool {
        return FUtenteReg::eliminaCarta($carta->getNumero(), $utente->getEmail());
    }

    /**
     * Preleva tutte le carte di credito appartenenti ad un utente nel database.
     * @param EUtenteReg $utente
     * @return array
     */
    public function prelevaCarteUtente(EUtenteReg $utente) : array {
        return FUtenteReg::prelevaCarte($utente->getEmail());
    }

    /**
     * Preleva tutti i carrelli salvati appartenenti ad un utente nel database.
     * @param EUtenteReg $utente
     * @return array
     */
    public function prelevaCarrelliUtente(EUtenteReg $utente) : array {
        return FCarrello::prelevaCarrelli($utente->getEmail());
    }

    /**
     * Preleva tutte le n-uple della tabella CartaCredito e risveglia in RAM le istanze di ECartaCredito corrispondenti.
     * @return array
     */
    public function prelevaCarte() : array {
        return FCartaCredito::prelevaCarte();
    }

    /**
     * Preleva tutte le n-uple della tabella Indirizzo e risveglia in RAM le istanze di EIndirizzo corrispondenti.
     * @return array
     */
    public function prelevaIndirizzi() : array {
        return FIndirizzo::prelevaIndirizzi();
    }

}



