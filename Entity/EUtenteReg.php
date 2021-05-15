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
    private array $carteSalvate = array();

    /**
     * Array che contiene tutti i carrelli salvati dall'utente
     * @var array
     */
    private array $carrelliSalvati = array();

    /**
     * Array che contiene tutti i buoni sconto posseduti dall'utente
     * @var array
     */
    private array $buoniSconto = array();

    /**
     * Array che contiene tutti gli indirizzi salvati dall'utene
     * @var array
     */
    private array $indirizzi = array();


    /**
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public function __constructor(string $nome, string $cognome, string $email, string $password)
    {
        parent::__construct($nome, $cognome, $email, $password);
        $this->punti = 0;
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
        $this->carteSalvate[] = $carta;
    }

    public function inserisciIndirizzo(string $via, string $numero, string $comune, string $provincia, bool $predefinito): void {
        $ind = new EIndirizzo($via, $numero, $comune,$provincia,$predefinito);
        $this->indirizzi[] = $ind;
    }

    /**
     * Metodo per poter regalare dei punti ad un altro utente
     * @param int $puntidaregalare
     * @param EUtenteReg $utente
     * @param string $messaggio
     */
    public function regalarePunti(int $puntidaregalare, EUtenteReg $utente, string $messaggio): void{
        if ($this->punti < $puntidaregalare){
            print("Impossibile");

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
        $this->carrelliSalvati[] = $carrello;
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
     * @return EBuono
     */
    public function getBuonoSconto(int $codice): EBuono{
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
     * Metodo che applica un buono sconto a un certo ordine riducendone il totale
     * @param EOrdine $ordine
     * @param EBuonoSconto $buono
     */
    public function applicaBuono(EOrdine $ordine, EBuonoSconto $buono): void {
        if( $ordine->getPrezzoTotale() < $buono->getAmmontare()){
            $ordine->setPrezzoTotale(0);
        }
        else{
            $nuovotot = $ordine->getPrezzoTotale() - $buono->getAmmontare();
            $ordine->setPrezzoTotale($nuovotot);
        }

    }


    public function setIndirizzoPredefinito(EIndirizzo $indirizzo): void
    {
        foreach ($this->indirizzi as $k => $v) {
            if ($v == $indirizzo)
                {
                    $v->setPredefinito(true);
                }
            }
        }
    }









