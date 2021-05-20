<?php


/**
 * La classe EImmagine implementa l'immagine associata ai vari articoli.
 */
class EImmagine
{
    //ATTRIBUTI:
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
     * Dimensione dell'immagine (in byte).
     * @var int|float
     */
    private int $byte;
    /**
     * Larghezza in pixel dell'immagine.
     * @var int|mixed
     */
    private int $larghezza;
    /**
     * Altezza in pixel dell'immagine
     * @var int|mixed
     */
    private int $altezza;
    /**
     * MIME dell'immagine.
     * @var string|mixed
     */
    private string $mime;



    //COSTRUTTORE:

    /**
     * EImmagine costruttore.
     * @param string $full_name
     */
    public function __construct(string $full_name){
        $array=explode("\\",$full_name);  //separo le varie componenti del nome intero del file
        $var1=count($array);
        $parola=$array[$var1-1];  //prelevo l'ultima componente corrispondente a nome+formato dell'immagine
        $array2=explode(".",$parola);  //essendo il formato denotato con .xxx separo in corrispondenza del "."
        $var2=count($array2);
        $s ="";   //inizializzo stringa vuota
        for ($i=0;$i<=$var2-2;++$i){   //escludo il formato dal nome facendo arrivare il ciclo for fino al penulimo elemento dell'array
            $s=$s.$array2[$i]." ";
        }
        $this->nome=$s; //imposto il nome
        $this->formato=$array2[$var2-1]; //recupero l'ultimo elemento dell'array2 che rappresenta proprio il formato (corrisponde infatti all'ultimo elemento del file_name)
        $info=getimagesize($full_name);  //recupero le info dall'immagine corrispondente al nome del file fornito
        $this->byte=($info['bits'])/8;  //imposto i byte dell'immagine dividendo i bits recuperati per 8
        $this->larghezza=$info[0];
        $this->altezza=$info[1];
        $this->mime=$info['mime'];  //imposto il MIME dell'immagine per poter recuperare in seguito questa informazione per settare il Content-Type per l'HTTP


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
     * Restituisce la dimensione (in byte) dell'immagine.
     * @return float|int
     */
    public function getByte()
    {
        return $this->byte;
    }

    /**
     * Restituisce la larghezza dell'immagine.
     * @return int|mixed
     */
    public function getLarghezza()
    {
        return $this->larghezza;
    }

    /**
     * Restituisce l'altezza dell'immagine.
     * @return int|mixed
     */
    public function getAltezza()
    {
        return $this->altezza;
    }

    /**
     * Restituisce il MIME dell'immagine.
     * @return mixed|string
     */
    public function getMime()
    {
        return $this->mime;
    }
}
?>