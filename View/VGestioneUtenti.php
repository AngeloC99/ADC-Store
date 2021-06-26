<?php


class VGestioneUtenti {
    private $smarty;

    public function __construct() {
        $this->smarty=StartSmarty::configuration();
    }

    public function mostraProfilo($utente){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome', $utente->getNome());
        $this->smarty->assign('cognome', $utente->getCognome());
        $this->smarty->assign('email', $utente->getEmail());
        $this->smarty->assign('punti', $utente->getPunti());
        $this->smarty->display('profilefe.tpl');
    }

    public function mostraLogin() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('loginfe.tpl');
    }

    public function mostraHomeUtente() {
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("utente", $gs->caricaUtente()->getEmail());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('homeUtente.tpl');
    }

    public function mostraHomeAdmin() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('homeAdmin.tpl');
    }





}