<?php


/**
 * La classe EArticolo modella i vari articoli ovvero premi e prodotti.
 * E' la superclasse di EPremio ed EProdotto.
 */
class EArticolo
{
    //ATTRIBUTI:
    /**
     * Nome dell'articolo.
     * @var string
     */
    private string $nome;
    /**
     * Marca dell'articolo.
     * @var string
     */
    private string $marca;
    /**
     * Descrizione dell'articolo.
     * @var string
     */
    private string $descrizione;
    /**
     * Quantità dell'articolo.
     * @var int
     */
    private int $quantita;
    /**
     * Immagine dell'articolo
     * @var EImmagine
     */
    private EImmagine $immagine;

    //COSTRUTTORE:

    /**
     * EArticolo costruttore.
     * @param string $n
     * @param string $m
     * @param string $d
     * @param int $q
     * @param EImmagine $i
     */
    public function __construct(string $n, string $m, string $d, int $q, EImmagine $i) {
        $this->nome=$n;
        $this->marca=$m;
        $this->descrizione=$d;
        $this->quantita=$q;
        $this->immagine=$i;
    }

    //METODI:


    /**
     * Restituisce il nome dell'articolo.
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Setta il nome dell'articolo.
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * Restituisce la marca dell'articolo.
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * Setta la marca dell'articolo.
     * @param string $marca
     */
    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    /**
     * Restituisce la descrizione dell'articolo.
     * @return string
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * Setta la descrizione dell'articolo.
     * @param string $descrizione
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * Restituisce la quantità dell'articolo.
     * @return int
     */
    public function getQuantita(): int
    {
        return $this->quantita;
    }

    /**
     * Setta la quantità dell'articolo.
     * @param int $quantita
     */
    public function setQuantita(int $quantita): void
    {
        $this->quantita = $quantita;
    }

    /**
     * restituisce l'oggetto EImmagine relativo all'immagine dell'articolo.
     * @return EImmagine
     */
    public function getImmagine(): EImmagine
    {
        return $this->immagine;
    }

    /**
     * Setta l'immagine dell'articolo.
     * @param EImmagine $foto
     */
    public function setImmagine(EImmagine $img): void
    {
        $this->immagine = $img;
    }




}
?>