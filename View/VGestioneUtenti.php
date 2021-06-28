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

    public function mostraProfiloAdmin($utente){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome', $utente->getNome());
        $this->smarty->assign('cognome', $utente->getCognome());
        $this->smarty->assign('email', $utente->getEmail());
        $this->smarty->display('profilebe.tpl');
    }

    public function mostraLogin() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('loginfe.tpl');
    }

    public function mostraHomeUtente() {
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("nome", $gs->caricaUtente()->getNome());
        $this->smarty->assign("cognome", $gs->caricaUtente()->getCognome());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('homeUtente.tpl');
    }

    public function mostraHomeAdmin() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('homeAdmin.tpl');
    }

    public function mostraClienti($clienti) {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign("clienti", $clienti);
        $this->smarty->display('user-list.tpl');
    }

    public function mostraCreazioneAccount(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('register.tpl');
    }





}