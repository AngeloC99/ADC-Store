<?php

/**
 * La classe EIndirizzo implementa l'indirizzo di consegna dell'utente o della sede in cui ritirare gli acquisti.
 * Class EIndirizzo
 * @access public
 * @package Entity
 * @author Angelo Casciani
 */

class EIndirizzo
{
    /**
     * Via di residenza dell'utente o della sede.
     * @var string
     */
    private string $via;
    /**
     * Numero all'interno della via che identifica l'indirizzo.
     * @var int
     */
    private int $numero;
    /**
     * Comune nel quale si trova l'indirizzo.
     * @var string
     */
    private string $comune;
    /**
     * Provincia di appartenenza.
     * @var string
     */
    private string $provincia;
    /**
     * Codice di avviamento postale del comune.
     * @var string
     */
    private string $cap;
    /**
     * Valore che indica se l'indirizzo in questione è stato impostato come predefinito dall'utente.
     * @var bool
     */
    private bool $predefinito;

    /**
     * Costruttore della classe EIndirizzo.
     * @param string $via
     * @param int $numero
     * @param string $comune
     * @param string $provincia
     * @param string $cap
     * @param bool $predefinito
     */

    public function __construct(string $via, int $numero, string $comune, string $provincia, string $cap, bool $predefinito) {

        $this->via = $via;
        $this->numero = $numero;
        $this->comune = $comune;
        $this->provincia = $provincia;
        $this->cap = $cap;
        $this->predefinito = $predefinito;
    }

    /**
     * Restituisce la via.
     * @return string
     */
    public function getVia(): string {
        return $this->via;
    }

    /**
     * Imposta una nuova via all'indirizzo.
     * @param string $via
     */
    public function setVia(string $via): void {
        $this->via = $via;
    }

    /**
     * Restituisce il numero dell'indirizzo.
     * @return int
     */
    public function getNumero(): int {
        return $this->numero;
    }

    /**
     * Imposta un nuovo numero all'indirizzo.
     * @param int $numero
     */
    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    /**
     * Restituisce il comune nel quale si trova tale indirizzo.
     * @return string
     */
    public function getComune(): string {
        return $this->comune;
    }

    /**
     * Imposta un nuovo comune per l'indirizzo.
     * @param string $comune
     */
    public function setComune(string $comune): void {
        $this->comune = $comune;
    }

    /**
     * Restituisce la provincia di appartenenza.
     * @return string
     */
    public function getProvincia(): string {
        return $this->provincia;
    }

    /**
     * Imposta una nuova provincia all'indirizzo.
     * @param string $provincia
     */
    public function setProvincia(string $provincia): void {
        $this->provincia = $provincia;
    }

    /**
     * Restituisce il codice di avviamento postale del comune.
     * @return string
     */
    public function getCap(): string {
        return $this->cap;
    }

    /**
     * Imposta un nuovo codice di avviamento postale.
     * @param string $cap
     */
    public function setCap(string $cap): void {
        $this->cap = $cap;
    }

    /**
     * Indica se l'indirizzo in analisi è quello predefinito.
     * @return bool
     */
    public function isPredefinito(): bool {
        return $this->predefinito;
    }

    /**
     * Imposta l'indirizzo come predefinito.
     * @param bool $predefinito
     */
    public function setPredefinito(bool $predefinito): void {
        $this->predefinito = $predefinito;
    }

}