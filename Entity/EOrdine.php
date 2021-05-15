<?php

/**
 * La classe EOrdine implementa un ordine d'acquisto compiuto da un utente.
 * Class EOrdine
 * @access public
 * @package Entity
 * @author Angelo Casciani
 */

class EOrdine
{
    /**
     * Contatore di classe per l'assegnazione di un id progressivo al carrello.
     * @var int
     */
    private static int $contatore = 0;
    /**
     * Codice identificativo dell'ordine d'acquisto.
     * @var int
     */
    private int $id;
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
        $this->id = self::$contatore++;
        $this->dataAcquisto = new DateTime("now");
        $this->prezzoTotale = $carrello->getPrezzoTot();
        $this->carrello = $carrello;
        $this->indirizzo = $indirizzo;
    }

    /**
     * Restituisce l'identificativo dell'ordine.
     * @return int
     */
    public function getId(): int {
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
     * Imposta il nuovo prezzo da corrispondere per l'ordine effettuato, a fronte dell'applicazione di un buono sconto.
     * @param EBuonoSconto ...$buonoSconto
     */
    public function applicaSconti(EBuonoSconto ...$buonoSconto): void {
        foreach ($buonoSconto as $sconto) {
            $this->prezzoTotale -= (float) $sconto->getAmmontare();
        }
    }

    /**
     * @param ECarrello $carrello
     */
    public function setCarrello(ECarrello $carrello): void {
        $this->carrello = $carrello;
    }

    /**
     * @param EIndirizzo $indirizzo
     */
    public function setIndirizzo(EIndirizzo $indirizzo): void {
        $this->indirizzo = $indirizzo;
    }

}