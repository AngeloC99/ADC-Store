<?php


/**
 * La classe Ricerca si occupa della ricerca di prodotti
 * Class CRicerca
 */
class CRicerca{


    /**
     * Recupera tutti i prodotti nel database
     * @return array
     */
    public static function recuperaProdotti() :array{
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaProdotti();
    }

    /**
     * Ritorna tutti i prodotti di una certa tipologia
     * @param string $tipologia
     * @return array
     */
    public static function cercaProdotto(string $tipologia) : array{
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaProdottiByTip($tipologia);
    }

    /**
     * Seleziona un solo prodotto referenziato dall' ID che viene passato
     * @param string $id
     * @return EProdotto
     */
    public static function selezionaProdotto(string $id): EProdotto {
        $pm = FPersistentManager::getInstance();
        return $pm->load('FProdotto',$id);
    }
}