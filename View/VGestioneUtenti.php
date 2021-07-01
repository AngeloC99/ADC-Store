<?php

/**
 * VGestioneUtenti si occupa di riempire con i dati ricevuti dallo strato Control (o di inoltrare dati compilati tramite form allo strato Control) le varie viste associate agli utenti (o admin).
 * Class VGestioneUtenti
 * @access public
 * @package View
 */
class VGestioneUtenti {
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * VGestioneUtenti constructor.
     */
    public function __construct() {
        $this->smarty=StartSmarty::configuration();
    }

    /**
     * Metodo per mostrare il profilo dell'utente.
     * @param $utente
     * @throws SmartyException
     */
    public function mostraProfilo($utente){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome', $utente->getNome());
        $this->smarty->assign('cognome', $utente->getCognome());
        $this->smarty->assign('email', $utente->getEmail());
        $this->smarty->assign('punti', $utente->getPunti());
        $this->smarty->display('profilefe.tpl');
    }

    /**
     * Metodo che permette di mostrare il profilo dell'admin.
     * @param $utente
     * @throws SmartyException
     */
    public function mostraProfiloAdmin($utente){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome', $utente->getNome());
        $this->smarty->assign('cognome', $utente->getCognome());
        $this->smarty->assign('email', $utente->getEmail());
        $this->smarty->display('profilebe.tpl');
    }

    /**
     * Metodo che permette di mostrare il login dell'utente.
     * @throws SmartyException
     */
    public function mostraLogin() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('loginfe.tpl');
    }

    /**
     * Metodo che permette di mostrare il login dell'admin.
     * @throws SmartyException
     */
    public function mostraLoginAdmin() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('loginbe.tpl');
    }

    /**
     * Metodo che permette di mostrare la home dell'utente.
     * @throws SmartyException
     */
    public function mostraHomeUtente() {
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("nome", $gs->caricaUtente()->getNome());
        $this->smarty->assign("cognome", $gs->caricaUtente()->getCognome());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('homeUtente.tpl');
    }

    /**
     * Metodo che permette di mostrare la home dell'admin.
     * @throws SmartyException
     */
    public function mostraHomeAdmin() {
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("nome", $gs->caricaUtente()->getNome());
        $this->smarty->assign("cognome", $gs->caricaUtente()->getCognome());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('homeAdmin.tpl');
    }

    /**
     * Metodo che permette di mostrare la lista dei clienti.
     * @param $clienti
     * @throws SmartyException
     */
    public function mostraClienti($clienti) {
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign("nomeadmin", $gs->caricaUtente()->getNome());
        $this->smarty->assign("clienti", $clienti);
        $this->smarty->display('user-list.tpl');
    }

    /**
     * Metodo che permette di mostrare la schermata per la registrazione.
     * @throws SmartyException
     */
    public function mostraCreazioneAccount(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('register.tpl');
    }





}