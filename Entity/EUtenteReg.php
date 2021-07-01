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
    private array $carrelliSalvati;

    /**
     * Array che contiene tutti i buoni sconto posseduti dall'utente
     * @var array
     */
    private array $buoniSconto;

    /**
     * Array che contiene tutti gli indirizzi salvati dall'utene
     * @var array
     */
    private array $indirizzi;


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
     * Metodo che ritorna tutte le carte salvate dall'utente
     * @return array
     */
    public function getCarteSalvate(): array {
        return $this->carteSalvate;
    }





}









