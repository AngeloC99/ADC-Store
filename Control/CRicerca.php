<?php


class CRicerca{


    public static function recuperaProdotti() :array{
        $pm=new FPersistentManager();
        return $pm->prelevaProdotti();
    }

    public static function cercaProdotto(string $tipologia) : array{
        $pm=new FPersistentManager();
        return $pm->prelevaProdottiByTip($tipologia);
    }

    public static function selezionaProdotto(string $id) {
        $pm=new FPersistentManager();
        return $pm->load('FProdotto',$id);
    }
}