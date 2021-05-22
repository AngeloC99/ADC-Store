<?php

/**
 * Interfaccia che deve essere implementata dalle classi Foundation e che possiede i metodi CRUD ad esse associati.
 * Interface FBase
 * @access public
 * @package Foundation
 */
interface FBase
{
    /**
     * Verifica la presenza di una certa n-upla della tabella, selezionata tramite il valore della chiave passata
     * come argomento. Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param string $key
     * @return bool
     */
    public function exist(string $key): bool;

    /**
     * Cancella tutte le n-uple di una tabella nel database aventi per chiave primaria il valore passato come
     * argomento. Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param string $key
     * @return bool
     */
    public function delete(string $key): bool;

    /**
     * Restituisce tutte le n-uple di una tabella nel database aventi per chiave primaria il valore passato come
     * argomento.
     * @param string $key
     * @return object
     */
    public function load(string $key): object;

    /**
     * Memorizza in una tabella del database le informazioni riguardanti l'oggetto passato come argomento.
     * Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param object $o
     * @return bool
     */
    public function store(object $o): bool;

    /**
     * Aggiorna le informazioni inerenti ad un oggetto nel database con il nuovo oggetto passato come argomento.
     * Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param object $o
     * @return bool
     */
    public function update(object $o): bool;
}