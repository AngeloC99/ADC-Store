<?php


class CGestioneCarrello
{
    public static function recuperaCarrello(string $id) {
        $pm = FPersistentManager::getInstance();
        $carrello = $pm->load("FCarrello", $id);
        VGestioneCarrello::mostraCarrello($carrello);
    }

    public static function aggiungiAlCarrello() {

    }

    public static function modificaQuantità() {

    }

    public static function procediOrdine() {

    }

    public static function procediAcquisto() {

    }

    public static function recuperaCarrelliSalvati() {

    }

    public static function salvaCarrello() {

    }
}