<?php

/**
 * VGestioneIndirizzi si occupa di riempire con i dati ricevuti dallo strato Control le varie viste associate alla
 * gestione degli indirizzi.
 * Class VGestioneIndirizzi
 * @access public
 * @package View
 */

class VGestioneIndirizzi {
    /**
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * VGestioneIndirizzi constructor.
     */
    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Metodo che riempie con i dati ricevuti e visualizza il template di gestione degli indirizzi.
     * @param EUtenteReg $utente
     * @param array $indArr
     * @throws SmartyException
     */
    public function mostraIndirizzi(EUtenteReg $utente, array $indArr){
        $this->smarty->assign('indirizzi', $indArr);
        $this->smarty->assign("path", $GLOBALS["path"]);

        $this->smarty->display('gestioneIndirizzi.tpl');
    }
}