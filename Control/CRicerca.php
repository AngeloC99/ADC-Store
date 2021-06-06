<?php


class CRicerca{


    public static function recuperaProdotti() :array{
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaProdotti();
    }

    public static function cercaProdotto(string $tipologia) : array{
        $pm = FPersistentManager::getInstance();
        return $pm->prelevaProdottiByTip($tipologia);
    }

    public static function selezionaProdotto(string $id): EProdotto {
        $pm = FPersistentManager::getInstance();
        return $pm->load('FProdotto',$id);
    }
}