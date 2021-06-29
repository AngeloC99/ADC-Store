<?php

/**
 * VGestioneCartaCredito si occupa di riempire con i dati ricevuti dallo strato Control le varie viste associate alla
 * gestione delle carte di credito.
 * Class VGestioneCartaCredito
 * @access public
 * @package View
 */

class VGestioneCartaCredito {
    /**
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * VGestioneCartaCredito constructor.
     */
    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Metodo che riempie con i dati ricevuti e visualizza il template di gestione delle carte di credito.
     * @param EUtenteReg $utente
     * @param array $carteArr
     * @throws SmartyException
     */
    public function mostraCarte(EUtenteReg $utente, array $carteArr){
        $this->smarty->assign('carte', $carteArr);
        $this->smarty->assign("path", $GLOBALS["path"]);

        $this->smarty->display('gestioneCarte.tpl');
    }
}