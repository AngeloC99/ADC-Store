<?php

/**
 * Interfaccia che deve essere implementata dalle classi Foundation e che possiede i metodi CRUD ad esse associati.
 * Interface FBase
 * @package Foundation
 */
interface FBase
{
    /**
     * Verifica la presenza di una certa n-upla della tabella, selezionata tramite il valore della chiave passata
     * come argomento. Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param $key1
     * @param $key2
     * @param $key3
     * @return bool
     */
    public static function exist($key1, $key2, $key3): bool;


    /**
     * Cancella tutte le n-uple di una tabella nel database aventi come chiave primaria il valore passato come
     * argomento. Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param $key1
     * @param $key2
     * @param $key3
     * @return bool
     */
    public static function delete($key1, $key2, $key3): bool;


    /**
     * Restituisce tutte le n-uple di una tabella nel database aventi per chiave primaria il valore passato come
     * argomento.
     * @param $key1
     * @param $key2
     * @param $key3
     * @return mixed
     */
    public static function load($key1, $key2, $key3);

    /**
     * Memorizza in una tabella del database le informazioni riguardanti l'oggetto passato come argomento.
     * Ritorna un valore booleano che indica l'esito dell'operazione.
     * @param $obj
     * @return bool
     */
    public static function store($obj): bool;


    /**
     * Aggiorna le informazioni inerenti ad un oggetto salvato nel database e restituisce un booleano che indica
     * l'esito dell'operazione.
     * @param $obj
     * @return bool
     */
    public static function update($obj): bool;
}