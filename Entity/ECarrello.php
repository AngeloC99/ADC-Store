<?php

/**
 * La classe ECarrello implementa un carrello in cui l'utente inserisce i prodotti da acquistare.
 * Class ECarrello
 * @access public
 * @package Entity
 */

class ECarrello
{
    /**
     * Identificativo del carrello.
     * @var string
     */
    private string $id;
    /**
     * Nome assegnato al carrello salvato.
     * @var string
     */
    private string $nome;
    /**
     * Lista di prodotti (tramite gli id) inseriti nel carrello, con le rispettive quantità come valori.
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
    public function __construct() {
        $this->id = uniqid('Car');
        $this->nome = "";
        $this->prodotti = array();
        $this->prezzoTot = 0.0;
    }

    /**
     * Restituisce l'identificativo del carrello.
     * @return string
     */
    public function getId(): string {
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
     * Aggiunge un prodotto alla lista di prodotti presenti nel carrello.
     * @param EProdotto $p
     * @param int $quantitaRichiesta
     */
    public function aggiungiProdotto(EProdotto $p, int $quantitaRichiesta): void {
        if (array_key_exists($p->getId(), $this->getProdotti())) {
            if ($p->getQuantita() >= $quantitaRichiesta) {
                $differenzaPrezzo = $quantitaRichiesta * $p->getPrezzo();
                $this->prodotti[$p->getId()] += $quantitaRichiesta;
                $this->prezzoTot += $differenzaPrezzo;
            }
        }
        else if ($p->getQuantita() >= $quantitaRichiesta) {
            $this->prodotti[$p->getId()] = $quantitaRichiesta;
            $this->prezzoTot += $p->getPrezzo() * $quantitaRichiesta;
        }
        else print("Quantità non disponibile!");
    }

    /**
     * Modifica la quantità di un prodotto presente nel carrello.
     * @param EProdotto $p
     * @param int $quantita
     */
    public function modificaQuantita(EProdotto $p, int $quantita): void {
        if ($p->getQuantita() >= $quantita) {
            $differenzaPrezzo = ($this->prodotti[$p->getId()] - $quantita) * $p->getPrezzo();
            $this->prodotti[$p->getId()] = $quantita;
            $this->prezzoTot -= $differenzaPrezzo;
            if ($quantita == 0) {
                unset($this->prodotti[$p->getId()]);
            }
        }
        else print("Quantità non disponibile!");
    }

    /**
     * Imposta l'identificativo del carrello.
     * @param string $id
     */
    public function setId(string $id): void {
        $this->id = $id;
    }
}