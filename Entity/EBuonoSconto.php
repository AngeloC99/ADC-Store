<?php


/**
 * La classe EBuonoSconto modella i buoni sconto. Questi buoni vengono creati dall'amministratore che provvede ad inoltrarli a determinati clienti da lui selezionati.
 */
class EBuonoSconto
{
    //ATTRIBUTI:
    /**
     * Valore del buono.
     * @var int
     */
    private int $ammontare;
    /**
     * Booleano che indica se il valore del buono è percentuale (xx%) oppure assoluto (xx€).
     * @var bool
     */
    private bool $percentuale;
    /**
     * Identificativo univoco del buono.
     * @var String
     */
    private String $codice;
    /**
     * Eventuale messaggio per l'utente destinatario.
     * @var string
     */
    private string $messaggio;
    /**
     * Data di scadenza.
     * @var DateTime
     */
    private DateTime $scadenza;

    //COSTRUTTORE:

    /**
     * EBuonoSconto costruttore.
     * @param bool $b
     * @param int $a
     * @param string $m
     */
    public function __construct(bool $b, int $a, string $m='')
    {
        $this->percentuale=$b;
        $this->ammontare=$a;
        $this->codice=uniqid("BS");
        $this->messaggio = $m;
        $data = new DateTime('now');
        $data->modify('+1 month');
        $this->scadenza=$data;

    }

    //METODI:

    /**
     * Restituisce l'ammontare (il valore) del buono.
     * @return int
     */
    public function getAmmontare(): int
    {
        return $this->ammontare;
    }

    /**
     * Restituisce il codice del buono.
     * @return string
     */
    public function getCodice(): string
    {
        return $this->codice;
    }

    /**
     * Restituisce la data di scadenza del buono (oggetto DateTime).
     * @return DateTime
     */
    public function getScadenza(): DateTime
    {
        return $this->scadenza;
    }

    /**
     * Restituisce true se l'ammontare è in percentuale, false altrimenti.
     * @return bool
     */
    public function isPercentuale(): bool
    {
        return $this->percentuale;
    }

    /**
     * Restituisce l'eventuale messaggio del buono.
     * @return string
     */
    public function getMessaggio(): string
    {
        return $this->messaggio;
    }


    /**
     * Restituisce il buono in formato stringa.
     * @return string
     */
    public function __toString(): string
    {
        $s='Codice: '.$this->codice;
        if($this->percentuale==false){
            $s=$s."\n".'Valore: '."-".$this->ammontare."€";
        }
        else{
            $s=$s."\n".'Valore: '."-".$this->ammontare."%";
        }
        $s=$s."\n"."Scade il: ".$this->scadenza->format('d-m-Y');
        if($this->messaggio=="")
        {
            return $s;
        }
        else{
            $s=$s."\n"."MESSAGGIO: ".$this->messaggio;
            return $s;
        }
    }

    /**
     * @param DateTime $scadenza
     */
    public function setScadenza(DateTime $scadenza): void
    {
        $this->scadenza = $scadenza;
    }

    /**
     * @param String $codice
     */
    public function setCodice(string $codice): void
    {
        $this->codice = $codice;
    }


}
?>