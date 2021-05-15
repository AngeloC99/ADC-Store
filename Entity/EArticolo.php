<?php


class EArticolo
{
    //ATTRIBUTI:
    private int $id;
    private string $nome;
    private string $marca;
    private string $descrizione;
    private int $quantità;
    private Immagine $foto;

    //COSTRUTTORE:
    public function __construct(string $n, string $m,string $d, int $q,Immagine $f) {
        $this->id=uniqid('Art'); //genera un id alfanumerico univoco avente come prefisso quello specificato come parametro
        $this->nome=$n;
        $this->marca=$m;
        $this->descrizione=$d;
        $this->quantità=$q;
        $this->foto=$f;
    }

    //METODI:


    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return string
     */
    public function getDescrizione(): string
    {
        return $this->descrizione;
    }

    /**
     * @param string $descrizione
     */
    public function setDescrizione(string $descrizione): void
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return int
     */
    public function getQuantità(): int
    {
        return $this->quantità;
    }

    /**
     * @param int $quantità
     */
    public function setQuantità(int $quantità): void
    {
        $this->quantità = $quantità;
    }

    /**
     * @return Immagine
     */
    public function getFoto(): Immagine
    {
        return $this->foto;
    }

    /**
     * @param Immagine $foto
     */
    public function setFoto(Immagine $foto): void
    {
        $this->foto = $foto;
    }




}
?>