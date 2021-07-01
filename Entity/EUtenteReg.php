<?php

/**
 * Classe EUtenteReg, sottoclasse di EPersona
 * Class EUtenteReg
 */

class EUtenteReg extends EPersona
{
    /**
     * I punti che l'utente ha attualmente
     * @var string
     */
    private string $punti;

    /**
     * Array che contiene tutte le carte di credito inserite dall'utente
     * @var array
     */
    private array $carteSalvate = array(ECartaCredito::class);

    /**
     * Array che contiene tutti i carrelli salvati dall'utente
     * @var array
     */
    private array $carrelliSalvati = array(ECarrello::class);

    /**
     * Array che contiene tutti i buoni sconto posseduti dall'utente
     * @var array
     */
    private array $buoniSconto = array(EBuonoSconto::class);

    /**
     * Array che contiene tutti gli indirizzi salvati dall'utene
     * @var array
     */
    private array $indirizzi = array(EIndirizzo::class);


    /**
     * Costruttore di un Utente
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public function __construct(string $nome, string $cognome, string $email, string $password)
    {
        parent::__construct($nome, $cognome, $email, $password);
        $this->punti = 0;
        $this->carteSalvate = array();
        $this->carrelliSalvati = array();
        $this->buoniSconto = array();
        $this->indirizzi = array();
    }

    /**
     * Metodo che restituisce i punti di un utente
     * @return int
     */
    public function getPunti(): int
    {
        return $this->punti;
    }

    /**
     * Metodo che setta i punti di un utente
     * @param string $punti
     */
    public function setPunti(int $punti): void
    {
        $this->punti = $punti;
    }

     /**
      * Metodo per impostare i buoni sconto dell'utente
     * @param array $buoniSconto
     */
     public function setBuoniSconto(array $buoniSconto): void
     {

         $this->buoniSconto = $buoniSconto;
     }

    /**
     * Metodo per poter inserire una nuova carta di credito
     * @param string $titolare
     * @param string $numero
     * @param string $circuito
     * @param DateTime $scadenza
     * @param int $cvv
     * @param float $ammontare
     */
    public function inserisciCarta(string $titolare, string $numero, string $circuito, DateTime $scadenza, int $cvv, float $ammontare): void{
        $carta = new ECartaCredito($titolare, $numero, $circuito, $scadenza, $cvv, $ammontare);
        $number = $carta->getNumero();
        $this->carteSalvate[$number] = $carta;
    }


    /**
     * Metodo per poter salvare un nuovo carrello
     * @param ECarrello $carrello
     * @param string $nome
     */
    public function aggiungiCarrelloSalvato(ECarrello $carrello, string $nome): void {
        $carrello->setNome($nome);
        $codice = $carrello->getId();
        $this->carrelliSalvati[$codice] = $carrello;
    }

    /**
     * Metodo che ritorna tutti i carrelli salvati dall'utente
     * @return array
     */
    public function getCarrelliSalvati(): array {
        return $this->carrelliSalvati;
    }

    /**
     * Metodo che ritorna tutti i buoni sconto posseduti dall'utente
     * @return array
     */
    public function getBuoniSconto(): array {
        return $this->buoniSconto;
    }

    /**
     * Metodo per poter ottenere uno specifico buono sconto
     * @param int $codice
     * @return EBuonoSconto
     */
    public function getBuonoSconto(int $codice): EBuonoSconto{
        return $this->buoniSconto[$codice];
    }

    /**
     * Metodo che ritorna tutti gli indirizzi salvati dall'utente
     * @return array
     */
    public function getIndirizzi(): array {
        return $this->indirizzi;
    }

    /**
     * Metodo per settare un nuovo array di indirizzi
     * @param array $newindirizzi
     */
    public function setIndirizzi(array $newindirizzi): void {
        $this->indirizzi = $newindirizzi;
}

    /**
     * Metodo che ritorna solo l'indirizzo predefinito
     * @return EIndirizzo
     */
    public function getIndirizzoPredefinito(): EIndirizzo {
        $indarray = $this->indirizzi;
        foreach ($indarray as $c => $v) {
            if ($v->isPredefinito()) {
                $i = $v;
            }
        }
        return $i;
    }

    /**
     * Metodo che ritorna tutte le carte salvate dall'utente
     * @return array
     */
    public function getCarteSalvate(): array {
        return $this->carteSalvate;
    }

    /**
     * Metodo che crea un indirizzo e lo setta come predefinito
     * @param string $via
     * @param int $numero
     * @param string $comune
     * @param string $provincia
     * @param int $cap
     * @param bool $predefinito
     */
    public function setIndirizzoPredefinito(string $via, int $numero, string $comune, string $provincia, int $cap, bool $predefinito): void
    {
        $ind = new EIndirizzo($via, $numero, $comune,$provincia,$cap,$predefinito);
        $array = $this->getIndirizzi();
        foreach ($array as $k => $v) {
            if ($v->isPredefinito())
                {
                    $v->setPredefinito(false);
                }
            }
        $ind->setPredefinito(true);
        $array[] = $ind;
        $this->setIndirizzi($array);
        }


    public function ConfermaOrdine(EOrdine $ordine, ECartaCredito $carta){
        if($carta->getAmmontare() < $ordine->getPrezzoTotale()){
            print("Eccezione"); //ECCEZIONE DA GESTIRE
        }
        else {
            $prezzo = $ordine->getPrezzoTotale();
            $punticorr = (int) $prezzo;
            $punti = $this->getPunti();
            $this->setPunti($punticorr + $punti);
            $carta->setAmmontare($carta->getAmmontare() - $prezzo);
        }
    }
}









