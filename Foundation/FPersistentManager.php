<?php

/**
 * Il FPersistentManager è l'unica classe accessibile agli strati superiori dello strato Foundation e gestisce la
 * persistenza di tutti gli oggetti appartenenti al package Entity. Implementa il design pattern Singleton.
 * Class FPersistentManager
 * @access public
 * @package Foundation
 */

class FPersistentManager
{
    /**
     * Istanza del PersistenManager.
     * @var FPersistentManager
     */
    private static $instance;


    /**
     * Implementa il metodo getInstance() del Singleton.
     * @return FPersistentManager
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new FPersistentManager();
        }

        return self::$instance;
    }

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
    public function load(string $Fclass, $key1, $key2=null, $key3=null) {
        $object = $Fclass::load($key1,$key2,$key3);
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
        $ris = $Fclass::store($obj,$mailutente);
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
        $ris = $Fclass::update($obj);
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
     * Preleva tutti gli utenti che non effettuano ordini da più di un mese.
     * @return array
     */
    public function prelevaUtentiInattivi() : array {
        return FOrdine::recuperaUtentiInattivi();
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

    /**
     * Preleva tutte le n-uple della tabella BuonoSconto e risveglia in RAM le istanze di EBuonoSconto corrispondenti.
     * @return array
     */
    public function prelevaBuoni(string $email): array{
        return FUtenteReg::prelevaBuoni($email);
    }

    /**
     * Preleva tutte le n-uple della tabella Premio (aventi prezzo in punti minore o uguale del valore passato come parametro) e risveglia in RAM le istanze di EPremio corrispondenti.
     * @param int $punti
     * @return array
     */
    public function prelevaPremiFiltrati(int $punti): array {
        return FPremio::prelevaPerPunti($punti);
    }

    /**
     * Preleva tutte le n-uple della tabella Premio e risveglia in RAM le istanze di EPremio corrispondenti.
     * @return array
     */
    public function prelevaPremi(): array{
        return FPremio::prelevaPremi();
    }

    /**
     * Preleva tutte le n-uple della tabella Prodotto e risveglia in RAM le istanze di EProdotto corrispondenti.
     * @return array
     */
    public function prelevaProdotti(): array {
        return FProdotto::prelevaProdotti();
    }

    /**
     * Preleva tutte le n-uple della tabella Prodotto (aventi la tipologia specificata come pramatro) e risveglia in RAM le istanze di EProdotto corrispondenti.
     * @param string $tip
     * @return array
     */
    public function prelevaProdottiByTip(string $tip): array{
        return FProdotto::prelevaPerTipologia($tip);
    }

    /**
     * Rimuove dalla tabella BuonoSconto l'n-upla corrispondente alla chiave fornita come parametro se la data di scadenza del buono coincide con la data odierna.
     * @param string $key
     * @return bool
     */
    public function rimuoviBuoniScaduti(string $key): bool{
        return FBuonoSconto::deleteBuoniScaduti($key);
    }
}



