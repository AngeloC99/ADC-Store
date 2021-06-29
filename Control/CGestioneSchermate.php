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
        if($gs->isLoggedUser()){
            $utente = $pm->load('FUtenteReg', $gs->caricaUtente()->getEmail());
            $v = new VGestioneUtenti();
            $v->mostraProfilo($utente);}
        else if($gs->isLoggedAdmin()){
            $utente = $pm->load('FAmministratore', $gs->caricaUtente()->getEmail());
            $v = new VGestioneUtenti();
            $v->mostraProfiloAdmin($utente);}
        else{
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    public static function recuperaLogin() {
        $v = new VGestioneUtenti();
        $v->mostraLogin();
    }

    public static function recuperaLoginAdmin() {
        $v = new VGestioneUtenti();
        $v->mostraLoginAdmin();

        }

    public static function recuperaHome() {
        $gs=CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $v = new VGestioneUtenti();
            $v->mostraHomeUtente();
        }
        if($gs->isLoggedAdmin()){
            $v = new VGestioneUtenti();
            $v->mostraHomeAdmin();
        }
        else{
            header("Location: ".$GLOBALS['path']."GestioneSchermate/showHome");
        }
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

    public static function recuperaHomeUtente() {
        $v = new VGestioneUtenti();
        $v->mostraHomeUtente();
    }

    public static function recuperaHomeAdmin() {
        $v = new VGestioneUtenti();
        $v->mostraHomeAdmin();
    }


    public static function recuperaAggiungiPremi() {
        $v = new VGestionePunti();
        $v->mostraAggiungiPremi();
    }

    public static function chiSiamo() {
        $v = new VGestioneSchermate();
        $v->mostraChiSiamo();
    }

    public static function recupera401() {
        $v=new VGestioneSchermate();
        $v->mostra401();
    }

    public static function recupera404() {
        $v=new VGestioneSchermate();
        $v->mostra404();
    }
}