<?php


class EProdotto extends EArticolo
{
    //ATTRIBUTI:
    private int $prezzo;
    private string $tipologia;

    //COSTRUTTORE:
    public function __construct(string $n, string $m, string $d, int $q, EImmagine $f,int $p,string $t)
    {
        parent::__construct($n, $m, $d, $q, $f);
        $this->prezzo=$p;
        $this->tipologia=$t;
    }

    //METODI:

    /**
     * @return int
     */
    public function getPrezzo(): int
    {
        return $this->prezzo;
    }

    /**
     * @param int $prezzo
     */
    public function setPrezzo(int $prezzo): void
    {
        $this->prezzo = $prezzo;
    }

    /**
     * @return string
     */
    public function getTipologia(): string
    {
        return $this->tipologia;
    }

    /**
     * @param string $tipologia
     */
    public function setTipologia(string $tipologia): void
    {
        $this->tipologia = $tipologia;
    }

}

?>


