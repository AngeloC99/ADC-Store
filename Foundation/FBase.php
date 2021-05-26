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
    public static function exist(string $key1, string $key2='', string $key3=''): bool;

    /**
     * Cancella tutte le n-uple di una tabella nel database aventi come chiave primaria il valore passato come
     * argomento. Ritorna un valore booleano che indica l'esito dell'operazione
     * @param string $key
     * @return bool
     */
    public static function delete(string $key1, string $key2='', string $key3=''): bool;

    /**
     * Restituisce tutte le n-uple di una tabella nel database aventi per chiave primaria il valore passato come
     * argomento.
     * @param string $key
     * @return object
     */
    public static function load(string $key1, string $key2='', string $key3='');

    /**
     * Memorizza in una tabella del database le informazioni riguardanti l'oggetto passato come argomento.
     * Ritorna un valore booleano che indica l'esito dell'operazione
     * @param object $obj
     * @return bool
     */
    public static function store($obj): bool;


    /**
     * @param $obj1
     * @return bool
     */
    public static function update($obj): bool;
}