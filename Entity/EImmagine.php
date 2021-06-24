<?php


/**
 * La classe EImmagine implementa l'immagine associata ai vari articoli.
 */
class EImmagine
{
    //ATTRIBUTI:
    /**
     * Id:
     */
    private string $id;
    /**
     * Nome dell'immagine.
     * @var string
     */
    private string $nome;
    /**
     * Formato dell'immagine.
     * @var string
     */
    private string $formato;

    /**
     * Immagine codificata secondo Base64.
     * @var string
     */
    private string $byte;



    //COSTRUTTORE:
    /**
     * Per recupero dell'immagine dal web o da file-system locale (o tramite eventuali parametri forniti che vanno a sovrascrivere quelli di default).
     * @param string $name
     */
    public function __construct(string $nome,string $formato,string $byte){
        $this->id=uniqid('I');
        $this->nome=$nome;
        $this->byte=$byte;
        $this->formato=$formato;

    }

    //METODI:
    /**
     * Restituisce il nome dell'immagine.
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Restituisce il formato dell'immagine.
     * @return mixed|string
     */
    public function getFormato()
    {
        return $this->formato;
    }




    /**
     * Restituisce l'immagine codificata in base64.
     * @return string
     */
    public function getByte(): string
    {
        return $this->byte;
    }

    /**
     * Setta il nome dell'immagine.
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * Setta il formato dell'immagine
     * @param string $formato
     */
    public function setFormato(string $formato): void
    {
        $this->formato = $formato;
    }


    /**
     * Setta la codifica in base64 dell'immagine.
     * @param string $byte
     */
    public function setByte(string $byte): void
    {
        $this->byte = $byte;
    }

    /**
     * Restituisce l'id dell'immagine.
     * @return string
     */

    public function getId() : string{
        return $this->id;
    }

    /**
     * Setta l'id dell'immagine.
     * @param string $s
     */
    public function setId(string $s){
        $this->id=$s;
    }

}

?>