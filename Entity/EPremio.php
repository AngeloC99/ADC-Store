<?php


/**
 * La classe EPremio modella i premi inseriti dall'amministratore e acquistabili dagli utenti registarti mediante punti,in determinati periodi dell'anno.
 * Questa classe estende la classe EArticolo.
 */
class EPremio extends EArticolo
{
    //ATTRIBUTI:
    /**
     * Identificativo univoco dell'articolo.
     * @var string
     */
    private string $id;
    /**
     * Punti necessari per l'acquisto del premio.
     * @var int
     */
    private int $prezzoInPunti;

    //COSTRUTTORE:

    /**
     * EPremio costruttore.
     * I primi 5 parametri vengono passati al costruttore della superclasse.
     * @param string $n
     * @param string $m
     * @param string $d
     * @param int $q
     * @param EImmagine $f
     * @param int $pp
     */
    public function __construct(string $n, string $m, string $d, int $q, EImmagine $f, int $pp)
    {
        parent::__construct($n, $m, $d, $q, $f);
        $this->id=uniqid('PRE'); //genera un id alfanumerico univoco avente come prefisso quello specificato come parametro
        $this->prezzoInPunti=$pp;
    }

    //METODI:

    /**
     * Restituisce l'identificativo dell'articolo.
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Restituisce i punti necessari all'acquisto del premio.
     * @return int
     */
    public function getPrezzoInPunti(): int
    {
        return $this->prezzoInPunti;
    }

    /**
     * Setta i punti necessari all'acquisto del premio.
     * @param int $prezzoInPunti
     */
    public function setPrezzoInPunti(int $prezzoInPunti): void
    {
        $this->prezzoInPunti = $prezzoInPunti;
    }

    /**
     * Imposta l'ID del premio
     * @param string $id
     */
    public function setId(string $id): void{
        $this->id = $id;
    }

}

?>

