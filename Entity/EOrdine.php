<?php

/**
 * La classe EOrdine implementa un ordine d'acquisto compiuto da un utente.
 * Class EOrdine
 * @access public
 * @package Entity
 */

class EOrdine
{
    /**
     * Codice identificativo dell'ordine d'acquisto.
     * @var string
     */
    private string $id;
    /**
     * Data nella quale è stato compiuto l'ordine.
     * @var DateTime
     */
    private DateTime $dataAcquisto;
    /**
     * Prezzo totale del carrello acquistato tramite l'ordine, comprensivo di eventuali sconti.
     * @var float
     */
    private float $prezzoTotale;
    /**
     * Carrello di prodotti acquistato con l'ordine.
     * @var ECarrello
     */
    private ECarrello $carrello;
    /**
     * Indirizzo di consegna o di ritiro dell'ordine.
     * @var EIndirizzo
     */
    private EIndirizzo $indirizzo;

    /**
     * Costruttore della classe EOrdine.
     * @param ECarrello $carrello
     * @param EIndirizzo $indirizzo
     */
    public function __construct(ECarrello $carrello, EIndirizzo $indirizzo) {
        $this->id = uniqid('Ord');
        $this->dataAcquisto = new DateTime("now");
        $this->prezzoTotale = $carrello->getPrezzoTot();
        $this->carrello = $carrello;
        $this->indirizzo = $indirizzo;
    }

    /**
     * Restituisce l'identificativo dell'ordine.
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * Restituisce la data nella quale è stato effettuato l'ordine.
     * @return DateTime
     */
    public function getDataAcquisto(): DateTime {
        return $this->dataAcquisto;
    }

    /**
     * Restituisce il prezzo totale dell'ordine.
     * @return float
     */
    public function getPrezzoTotale(): float {
        return $this->prezzoTotale;
    }

    /**
     * Restituisce il carrello acquistato con l'ordine.
     * @return ECarrello
     */
    public function getCarrello(): ECarrello {
        return $this->carrello;
    }

    /**
     * Restituisce l'indirizzo associato all'ordine.
     * @return EIndirizzo
     */
    public function getIndirizzo(): EIndirizzo {
        return $this->indirizzo;
    }

    /**
     * Imposta il prezzo totale dell'ordine.
     * @param float $prezzoTotale
     */
    public function setPrezzoTotale(float $prezzoTotale): void {
        $this->prezzoTotale = $prezzoTotale;
    }

    /**
     * Imposta il carrello acquistato tramite l'ordine.
     * @param ECarrello $carrello
     */
    public function setCarrello(ECarrello $carrello): void {
        $this->carrello = $carrello;
    }

    /**
     * Imposta l'indirizzo di consegna dell'ordine.
     * @param EIndirizzo $indirizzo
     */
    public function setIndirizzo(EIndirizzo $indirizzo): void {
        $this->indirizzo = $indirizzo;
    }

    /**
     * Imposta l'ID dell'ordine.
     * @param string $id
     */
    public function setId(string $id): void {
        $this->id = $id;
    }

    /**
     * Imposta la data di acquisto del carrello.
     * @param DateTime $dataAcquisto
     */
    public function setDataAcquisto(DateTime $dataAcquisto): void {
        $this->dataAcquisto = $dataAcquisto;
    }

    /**
     * Applica un buono sconto ad un ordine riducendone il prezzo totale.
     * @param EBuonoSconto $buonoSconto
     */
    public function applicaBuono(EBuonoSconto $buonoSconto): void {
        if ($this->prezzoTotale <= $buonoSconto->getAmmontare()) {
            $this->prezzoTotale = 0;
        }
        else {
            if ($buonoSconto->isPercentuale() == true) {
                $this->prezzoTotale -= ($this->prezzoTotale * $buonoSconto->getAmmontare()) / 100;          // Se il buono è in percentuale
            }
            else $this->prezzoTotale -= $buonoSconto->getAmmontare();
        }
    }
}