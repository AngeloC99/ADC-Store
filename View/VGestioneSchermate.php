<?php

/**
 * VGestioneSchermate gestisce la visualizzazione delle singole schermate (senza passaggio di dati da Controller a View e viceversa)
 * Class VGestioneSchermate
 */
class VGestioneSchermate
{
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * VGestioneSchermate constructor.
     */
    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    /**
     * Metodo per mostrare la home generale
     * @throws SmartyException
     */
    public function showHome(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('home.tpl');
    }

    /**
     * Metodo che permette di recuperare la schermata dei dettagli del team di sviluppo.
     * @throws SmartyException
     */
    public function mostraChiSiamo() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('about-page.tpl');
    }

    /**
     * Metodo che permette di recuperare la schermata di errore (accesso non autorizzato).
     * @throws SmartyException
     */
    public function mostra401(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('401.tpl');
    }

    /**
     * Metodo che permette di recuperare la schermata di errore (pagina non trovata).
     * @throws SmartyException
     */
    public function mostra404(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('404.tpl');
    }

    /**
    * Metodo che permette di recuperare la schermata di errore (cookie disabilitati).
     * @throws SmartyException
     */
    public function mostraCookie(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('cookieTest.tpl');
    }

    /**
     * Metodo che permette di recuperare la schermata di errore nella registrazione (email già registrata).
     * @throws SmartyException
     */
    public function mostraErroreReg(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('ErroreReg.tpl');
    }
}