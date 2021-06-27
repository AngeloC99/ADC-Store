<?php


class CGestioneSchermate
{
    public static function showHome(){

        $v = new VGestioneSchermate();
        $v->showHome();

    }

    public static function apriProfilo(){
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        $utente = $pm->load('FUtenteReg', $gs->caricaUtente()->getEmail());
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

    public static function recuperaGestioneCarte() {
        header("Location: ".$GLOBALS['path']."GestioneCartaCredito/recuperaCarte");
    }

    public static function recuperaGestioneIndirizzi() {
        header("Location: ".$GLOBALS['path']."GestioneIndirizzi/recuperaIndirizzi");
    }

    public static function recuperaGestioneCarrelliSalvati() {
        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrelliSalvati");
    }

    public static function recuperaGestioneCarrello() {
        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrello");
    }
}