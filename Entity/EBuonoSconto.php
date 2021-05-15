<?php


class EBuonoSconto
{
    //ATTRIBUTI:
    private int $ammontare;
    private bool $percentuale;
    private String $codice;
    private string $scadenza; //data formattata come stringa dal metodo date (in collab. con mktime per ottenere timestamp)

    //COSTRUTTORE:
    public function __construct(bool $b,int $a)
    {
        $this->percentuale=$b;
        $this->ammontare=$a;
        $this->codice=uniqid("BS");
        $scadenza = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y")); //timestamp della data di scadenza rispetto alla data corrente (scadenza: un mese dalla creazione)
        $this->scadenza=date('d/m/Y',$scadenza);

    }

    //METODI:

    /**
     * @return int
     */
    public function getAmmontare(): int
    {
        return $this->ammontare;
    }

    /**
     * @return string
     */
    public function getCodice(): string
    {
        return $this->codice;
    }

    /**
     * @return false|string
     */
    public function getScadenza()
    {
        return $this->scadenza;
    }

    /**
     * @return bool
     */
    public function isPercentuale(): bool  //se viene restituito false,al totale a cui viene applicato il buono, viene tolto quanto specificato nel parametro $ammotare,se viene restituito true va fatta la percentuale...
    {
        return $this->percentuale;
    }
}
?>