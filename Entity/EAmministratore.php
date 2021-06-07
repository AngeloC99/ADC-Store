<?php


/**
 * Classe EAmministratore, sottoclasse di EPersona
 * Class EAmministratore
 */
class EAmministratore extends EPersona
{
    /**
     * EAmministratore constructor.
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public function __construct(string $nome, string $cognome, string $email, string $password)
    {
        parent::__construct($nome, $cognome, $email, $password);
    }

    /**
     * Metodo per modificare il prezzo di un prodotto
     * @param EProdotto $prodotto
     * @param int $prezzo
     */
    public function modificaPrezzo(EProdotto $prodotto, int $prezzo){
        $prodotto->setPrezzo($prezzo);
    }

    /**
     * Metodo che crea un buono e lo assegna ad un utente
     * @param int $ammontare
     * @param EUtenteReg $utente
     * @param string $messaggio
     */
    public function preparaBuono(bool $percentuale,int $ammontare, string $messaggio){ //tolto utente come parametro
        $buono = new EBuonoSconto($percentuale,$ammontare, $messaggio);
        //$array = $utente->getBuoniSconto();
        //$codice = $buono->getCodice();
        //$array[$codice] = $buono;
        //$utente->setBuoniSconto($array);
        //DA COMPLETARE CON EMAIL ECC
        return $buono;

    }

    /**
     * Metodo per aggiungere un nuovo prodotto
     * @param string $nome
     * @param string $tipologia
     * @param string $descrizione
     * @param int $quantita
     * @param int $prezzo
     * @param string $marca
     * @param EImmagine $immagine
     */
    public function aggiungiProdotto(string $nome, string $tipologia, string $descrizione, int $quantita, int $prezzo, string $marca, EImmagine $immagine){
        $product = new EProdotto($nome, $marca, $descrizione, $quantita, $immagine, $prezzo, $tipologia);
        //Richiamo a classe Foundation
    }

    /**
     * Metodo per aggiungere un nuovo premio
     * @param string $nome
     * @param string $descrizione
     * @param int $quantita
     * @param int $punti
     * @param string $marca
     * @param EImmagine $immagine
     */
    public function aggiungiPremio(string $nome, string $descrizione, int $quantita, int $punti, string $marca, EImmagine $immagine){
        $premio = new EPremio($nome, $marca, $descrizione, $quantita, $immagine, $punti);
        //Richiamo a classe Foundation
    }

    /**
     * Metodo che serve a modificare la quantità di un articolo
     * @param EArticolo $articolo
     * @param int $quantita
     */
    public function modificaQuantita(EArticolo $articolo, int $quantita, ){
        $articolo->setQuantita($quantita);
    }

}