<?php

/**
 * La classe ECartaCredito implementa una carta di credito che l'utente può inserire per effettuare acquisti nell'applicazione.
 * Class ECartaCredito
 * @access public
 * @package Entity
 * @author Angelo Casciani
 */

class ECartaCredito
{
    /**
     * Nome e cognome del titolare della carta di credito.
     * @var string
     */
    private string $titolare;
    /**
     * Codice identificativo della carta di credito.
     * @var string
     */
    private string $numero;
    /**
     * Circuito di pagamento sul quale si appoggia la carta di credito per effettuare le transazioni.
     * @var string
     */
    private string $circuito;
    /**
     * Data di scadenza della carta di credito.
     * @var DateTime
     */
    private DateTime $scadenza;
    /**
     * Codice di verifica e protezione della carta di credito.
     * @var int
     */
    private int $cvv;
    /**
     * Saldo presente nella carta di credito.
     * @var float
     */
    private float $ammontare;

    /**
     * Costruttore della classe ECartaCredito.
     * @param string $titolare
     * @param string $numero
     * @param string $circuito
     * @param DateTime $scadenza
     * @param int $cvv
     * @param float $ammontare
     */
    public function __constructor(string $titolare, string $numero, string $circuito, DateTime $scadenza, int $cvv, float $ammontare) {
        $this->titolare = $titolare;
        $this->numero = $numero;
        $this->circuito = $circuito;
        $this->scadenza = $scadenza;
        $this->cvv = $cvv;
        $this->ammontare = $ammontare;
    }

    /**
     * Restituisce il titolare della carta di credito.
     * @return string
     */
    public function getTitolare(): string
    {
        return $this->titolare;
    }

    /**
     * Restituisce il numero della carta di credito.
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Restituisce il circuito della carta di credito.
     * @return string
     */
    public function getCircuito(): string
    {
        return $this->circuito;
    }

    /**
     * Restituisce la scadenza della carta di credito.
     * @return DateTime
     */
    public function getScadenza(): DateTime
    {
        return $this->scadenza;
    }

    /**
     * Restituisce il cvv della carta di credito.
     * @return int
     */
    public function getCvv(): int
    {
        return $this->cvv;
    }

    /**
     * Restituisce l'ammontare presente nella carta di credito.
     * @return float
     */
    public function getAmmontare(): float
    {
        return $this->ammontare;
    }

    /**
     * Imposta una nuova data di scadenza per la carta di credito.
     * @param DateTime $scadenza
     */
    public function setScadenza(DateTime $scadenza): void
    {
        $this->scadenza = $scadenza;
    }

    /**
     * Imposta il nuovo cvv per la carta di credito.
     * @param int $cvv
     */
    public function setCvv(int $cvv): void
    {
        $this->cvv = $cvv;
    }

    /**
     * Imposta il nuovo ammontare presente nella carta di credito.
     * @param float $ammontare
     */
    public function setAmmontare(float $ammontare): void
    {
        $this->ammontare = $ammontare;
    }

}