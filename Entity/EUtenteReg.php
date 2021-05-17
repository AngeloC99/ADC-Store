<?php

/**
 * La classe UtenteReg è una sottoclasse della classe Persona
 */

class EUtenteReg extends EPersona
{
    /**
     * I punti che l'utente ha attualmente
     * @var string
     */
    private string $punti;

    /**
     * Array che contiene tutte le carte di credito inserire dall'utente
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
     * @return int
     */
    public function getPunti(): int
    {
        return $this->punti;
    }

    /**
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
     * Metodo per poter regalare dei punti ad un altro utente
     * @param int $puntidaregalare
     * @param EUtenteReg $utente
     * @param string $messaggio
     */
    public function regalarePunti(int $puntidaregalare, EUtenteReg $utente, string $messaggio): void{
        if ($this->punti < $puntidaregalare){
            print("Impossibile"); //GESTIRE ECCEZIONE

        }
        else{
            $this->punti = $this->punti - $puntidaregalare;
            $puntiNuovi = $utente->getPunti() + $puntidaregalare;
            $utente->setPunti($puntiNuovi);
        }
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
     * Metodo che applica un buono sconto ad un certo ordine riducendone il totale ed elimina il buono
     * utilizzato dai buoni che possiede l'utente
     * @param EOrdine $ordine
     * @param EBuonoSconto $buono
     */
    public function applicaBuono(EOrdine $ordine, EBuonoSconto $buonoSconto): void {
        if ($ordine->getPrezzoTotale() <= $buonoSconto->getAmmontare()) {
            $ordine->setPrezzoTotale(0);
        }
        else {
            if ($buonoSconto->isPercentuale() == true) {
                $ordine->setPrezzoTotale(($ordine->getPrezzoTotale() * $buonoSconto->getAmmontare()) / 100);          // Se il buono è in percentuale
            }
            else $ordine->setPrezzoTotale(($ordine->getPrezzoTotale() - $buonoSconto->getAmmontare()));
        }
        $codice = $buonoSconto->getCodice();
        $arraybuoni = $this->getBuoniSconto();
        unset($arraybuoni[$codice]);
        $this->setBuoniSconto($arraybuoni);
    }

    /**
     * Metodo che serve a impostare un indirizzo come predefinito
     * @param EIndirizzo $indirizzo
     */
    public function setIndirizzoPredefinito(string $via,int $numero,string $comune,string $provincia,int $cap,bool $predefinito): void
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
    }









