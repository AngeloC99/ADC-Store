<?php


class EImmagine
{
    //ATTRIBUTI:
    private string $nome;
    private string $formato;
    private int $byte;
    private int $larghezza;
    private int $altezza;
    private string $mime;



    //COSTRUTTORE:
    public function __construct(string $full_name){
        $array=explode("\\",$full_name);  //separo le varie componenti del nome intero del file
        $var1=count($array);
        $parola=$array[$var1-1];  //prelevo l'ultima componente corrispondente a nome+formato dell'immagine
        $array2=explode(".",$parola);  //essendo il formato denotato con .xxx separo in corrispondenza del "."
        $var2=count($array2);
        $s ="";   //inizializzo stringa vuota
        for ($i=0;$i<=$var2-2;++$i){   //escludo il formato dal nome facendo arrivare il ciclo for fino al penulimo elemento dell'array
            $s=$s.$array2[i]." ";
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
     * @return mixed|string
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * @param mixed|string $formato
     */
    public function setFormato($formato): void
    {
        $this->formato = $formato;
    }

    /**
     * @return float|int
     */
    public function getByte()
    {
        return $this->byte;
    }

    /**
     * @param float|int $byte
     */
    public function setByte($byte): void
    {
        $this->byte = $byte;
    }

    /**
     * @return int|mixed
     */
    public function getLarghezza()
    {
        return $this->larghezza;
    }

    /**
     * @param int|mixed $larghezza
     */
    public function setLarghezza($larghezza): void
    {
        $this->larghezza = $larghezza;
    }

    /**
     * @return int|mixed
     */
    public function getAltezza()
    {
        return $this->altezza;
    }

    /**
     * @param int|mixed $altezza
     */
    public function setAltezza($altezza): void
    {
        $this->altezza = $altezza;
    }

    /**
     * @return mixed|string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * @param mixed|string $mime
     */
    public function setMime($mime): void
    {
        $this->mime = $mime;
    }


}
?>