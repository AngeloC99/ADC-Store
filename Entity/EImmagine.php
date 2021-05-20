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
    private int $size;
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
    /**
     * Immagine codificata secondo Base64.
     * @var string
     */
    private string $byte;


    //COSTRUTTORE:

    /**
     * EImmagine costruttore.
     * @param string $name
     */
    public function __construct(string $name){
        $check=str_contains($name,'http'||'https');  //altri protocolli?
        if ($check==true){ //si tratta di un'immagine in rete:
            $full_name=$name;
            $this->nome='WebImage';
        }
        else{  //si tratta di un'immagine in un path locale:
            $name_array=explode(".",$name);
            $index=count($name_array);
            $name="\\".$name.".".$name_array[$index-1]; //stringa del tipo \nome.formato
            $full_name=__DIR__.$name;
            $s ="";   //inizializzo stringa vuota
            for ($i=0;$i<=$index-2;++$i){   //escludo il formato dal nome facendo arrivare il ciclo for fino al penulimo elemento dell'array
                $s=$s.$name_array[$i]." ";
            } //imposto il nome
            $this->nome=$s; //imposto il nome
        }

        $immagine = file_get_contents($name);
        $this->byte = base64_encode($immagine);
        $info=getimagesize($full_name);  //recupero le info dall'immagine corrispondente al nome del file fornito
        $numero=$info[2];
        $control=array(1=>'GIF',2=>'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD', 6 => 'BMP', 7 => 'TIFF_I' , 8 => 'TIFF_M' , 9 => 'CPM', 10 => 'JP2',11 => 'JPX', 12 => 'JB2',13 => 'SWC', 14 => 'IFF', 15 => 'WBMP', 16 => 'XBM');
        $this->formato=$control[$numero];
        $this->size=($info['bits'])/8;  //imposto i byte dell'immagine dividendo i bits recuperati per 8
        $this->larghezza=$info[0];
        $this->altezza=$info[1];
        $this->mime=$info['mime']; //imposto il MIME dell'immagine per poter recuperare in seguito questa informazione per settare il Content-Type per l'HTTP
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
    public function getSize()
    {
        return $this->size;
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

    /**
     * Restituisce l'immagine codificata in base64.
     * @return string
     */
    public function getByte(): string
    {
        return $this->byte;
    }
}

?>