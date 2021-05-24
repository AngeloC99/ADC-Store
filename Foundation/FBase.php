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
    public static function exist(string $key): bool;

    /**
     * Cancella tutte le n-uple di una tabella nel database aventi come chiave primaria il valore passato come
     * argomento. Ritorna un valore booleano che indica l'esito dell'operazione
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool;

    /**
     * Restituisce tutte le n-uple di una tabella nel database aventi per chiave primaria il valore passato come
     * argomento.
     * @param string $key
     * @return object
     */
    public static function load(string $key);

    /**
     * Memorizza in una tabella del database le informazioni riguardanti l'oggetto passato come argomento.
     * Ritorna un valore booleano che indica l'esito dell'operazione
     * @param object $obj
     * @return bool
     */
    public static function store($obj): bool;

    /**
     * Aggiorna le informazioni inerenti ad un oggetto nel database con il nuovo oggetto passato come argomento.
     * Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param object $obj
     * @return bool
     */
    public static function update($obj1, $obj2): bool;
}