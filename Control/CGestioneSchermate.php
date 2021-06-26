<?php


class CGestioneSchermate
{
    public static function showHome(){

        $v = new VGestioneSchermate();
        $v->showHome();

    }

    public static function apriProfilo(){

        $pm = FPersistentManager::getInstance();
        $utente = $pm->load('FUtenteReg', "adarossi@gmail.com");
        $v = new VGestioneUtenti();
        $v->mostraProfilo($utente);
    }

    public static function recuperaLogin() {
        $v = new VGestioneUtenti();
        $v->mostraLogin();
    }

    public static function recuperaHomeUtente() {
        $v = new VGestioneUtenti();
        $v->mostraHomeUtente();
    }

    public static function recuperaHomeAdmin() {
        $v = new VGestioneUtenti();
        $v->mostraHomeAdmin();
    }

    public static function recuperaFormPunti() {
        $v = new VGestionePunti();
        $v->mostraFormPunti();
    }


}