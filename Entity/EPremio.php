<?php


class EPremio extends EArticolo
{
    //ATTRIBUTI:
    private int $prezzoInPunti;

    //COSTRUTTORE:
    public function __construct(string $n, string $m, string $d, int $q, Immagine $f,int $pp)
    {
        parent::__construct($n, $m, $d, $q, $f);
        $this->prezzoInPunti=$pp;
    }

    //METODI:

    /**
     * @return int
     */
    public function getPrezzoInPunti(): int
    {
        return $this->prezzoInPunti;
    }

    /**
     * @param int $prezzoInPunti
     */
    public function setPrezzoInPunti(int $prezzoInPunti): void
    {
        $this->prezzoInPunti = $prezzoInPunti;
    }

}

?>

