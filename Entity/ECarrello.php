<?php

/**
 * La classe ECarrello implementa un carrello in cui l'utente inserisce i prodotti da acquistare.
 * Class ECarrello
 * @access public
 * @package Entity
 * @author Angelo Casciani
 */

class ECarrello
{
    /**
     * Contatore di classe per l'assegnazione di un id progressivo al carrello.
     * @var int
     */
    private static int $contatore = 0;
    /**
     * Identificativo del carrello.
     * @var int
     */
    private int $id;
    /**
     * Nome assegnato al carrello salvato.
     * @var string
     */
    private string $nome;
    /**
     * Valore booleano che indica se il carrello in questione è quello di default.
     * @var bool
     */
    private bool $default;
    /**
     * Lista di prodotti inseriti nel carrello.
     * @var array
     */
    private array $prodotti;
    /**
     * Prezzo del carrello, calcolato in base ai prodotti che contiene.
     * @var float
     */
    private float $prezzoTot;

    /**
     * Costruttore della classe ECarrello.
     */
    public function __constructor() {
        $this->id = self::$contatore++;
        $this->nome = "";
        $this->default = false;
        $this->prodotti = array();
        $this->prezzoTot = 0.0;
    }

    /**
     * Restituisce l'identificativo del carrello.
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Restituisce il nome del carrello.
     * @return string
     */
    public function getNome(): string {
        return $this->nome;
    }

    /**
     * Restituisce l'informazione sul fatto che il carrello sia o meno quello di default.
     * @return bool
     */
    public function isDefault(): bool {
        return $this->default;
    }

    /**
     * Restituisce la lista di prodotti inseriti nel carrello.
     * @return array
     */
    public function getProdotti(): array {
        return $this->prodotti;
    }

    /**
     * Restituisce il prezzo attuale del carrello, in base ai prezzi dei prodotti in esso contenuti.
     * @return float
     */
    public function getPrezzoTot(): float {
        return $this->prezzoTot;
    }

    /**
     * Imposta un nuovo nome al carrello.
     * @param string $nome
     */
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    /**
     * Imposta il carrello come quello di default.
     * @param bool $default
     */
    public function setDefault(bool $default): void {
        $this->default = $default;
    }

    /**
     * Aggiunge un prodotto alla lista di prodotti presenti nel carrello
     * @param EProdotto $p
     * @param int $quantita
     */
    public function aggiungiProdotto(EProdotto $p, int $quantita): void {
        $this->prodotti[$p->getId()] = $quantita;
        $this->prezzoTot += $p->getPrezzo();
    }
}