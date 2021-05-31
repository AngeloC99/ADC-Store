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



    //COSTRUTTORE 1:
    /**
     * Per recupero dell'immagine dal web o su file-system locale.
     * @param string $name
     */
    public function __construct(string $nome,$formato=null,$size=null,$byte=null,$larghezza=null,$altezza=null,$mime=null){ //se su path locale: nome del tipo prova.jpg
        $check=str_contains($nome,'http'||'https');  //altri protocolli?

        if ($check==true){ //si tratta di un'immagine in rete:
            $full_name=$nome;
            $this->nome='WebImage';
        }
        else{  //si tratta di un'immagine in un path locale:
            $name_array=explode(".",$nome);
            $this->nome=$name_array[0];
            $nome="\\".$nome; //stringa del tipo \nome.formato
            $full_name=__DIR__.$nome;

        }

        $this->id=uniqid('I');

        if ($byte==null){
        $immagine = file_get_contents($full_name);
        $this->byte = base64_encode($immagine);
        }
        else{
            $this->byte=$byte;
        }

        $info=getimagesize($full_name);  //recupero le info dall'immagine corrispondente al nome del file fornito

        if ($formato==null){
            $numero=$info[2];
            $control=array(1=>'GIF',2=>'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD', 6 => 'BMP', 7 => 'TIFF_I' , 8 => 'TIFF_M' , 9 => 'CPM', 10 => 'JP2',11 => 'JPX', 12 => 'JB2',13 => 'SWC', 14 => 'IFF', 15 => 'WBMP', 16 => 'XBM');
            $this->formato=$control[$numero];
        }
        else{
            $this->formato=$formato;
        }

        if ($size==null){
            $this->size=($info['bits'])/8;
        }
        else{
            $this->size=$size;
        }
        if ($larghezza==null){
            $this->larghezza=$info[0];
        }
        else{
            $this->larghezza=$larghezza;
        }

        if($altezza==null){
            $this->altezza=$info[1];
        }
        else{
            $this->altezza=$altezza;
        }

        if($mime==null){
            $this->mime=$info['mime']; //imposto il MIME dell'immagine per poter recuperare in seguito questa informazione per settare il Content-Type per l'HTTP
        }
        else{
            $this->mime=$mime;
        }
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

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @param string $formato
     */
    public function setFormato(string $formato): void
    {
        $this->formato = $formato;
    }

    /**
     * @param float|int $size
     */
    public function setSize(float|int $size): void
    {
        $this->size = $size;
    }

    /**
     * @param int|mixed $larghezza
     */
    public function setLarghezza(mixed $larghezza): void
    {
        $this->larghezza = $larghezza;
    }

    /**
     * @param int|mixed $altezza
     */
    public function setAltezza(mixed $altezza): void
    {
        $this->altezza = $altezza;
    }

    /**
     * @param mixed|string $mime
     */
    public function setMime(mixed $mime): void
    {
        $this->mime = $mime;
    }

    /**
     * @param string $byte
     */
    public function setByte(string $byte): void
    {
        $this->byte = $byte;
    }

    public function getId() : string{
        return $this->id;
    }

    public function setId(string $s){
        $this->id=$s;
    }




}

?>