<?php


/**
 * La classe EProdotto modella i prodotti inseriti di volta in volta dall'amministratore, e acquistabili dagli utenti registarti.
 * Questa classe estende la classe EArticolo.
 */
class EProdotto extends EArticolo
{
    //ATTRIBUTI:
    /**
     * Prezzo del prodotto.
     * @var float
     */
    private float $prezzo;
    /**
     * Tipologia del prodotto.
     * @var string
     */
    private string $tipologia;

    //COSTRUTTORE:

    /**
     * EProdotto costruttore.
     * I primi 5 parametri vengono passati al costruttore della superclasse.
     * @param string $n
     * @param string $m
     * @param string $d
     * @param int $q
     * @param EImmagine $f
     * @param float $p
     * @param string $t
     */
    public function __construct(string $n, string $m, string $d, int $q, EImmagine $f, float $p, string $t)
    {
        parent::__construct($n, $m, $d, $q, $f);
        $this->prezzo=$p;
        $this->tipologia=$t;
    }

    //METODI:

    /**
     * Restituisce il prezzo del prodotto.
     * @return float
     */
    public function getPrezzo(): float
    {
        return $this->prezzo;
    }

    /**
     * Setta il prezzo del prodotto.
     * @param float $prezzo
     */
    public function setPrezzo(float $prezzo): void
    {
        $this->prezzo = $prezzo;
    }

    /**
     * Restituisce la tipologia del prodotto.
     * @return string
     */
    public function getTipologia(): string
    {
        return $this->tipologia;
    }

    /**
     * Setta la tipologia del prodotto.
     * @param string $tipologia
     */
    public function setTipologia(string $tipologia): void
    {
        $this->tipologia = $tipologia;
    }

}

?>


