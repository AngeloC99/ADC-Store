<?php

/**
 * VGestioneBuoni si occupa di riempire con i dati ricevuti dallo strato Control (o di inoltrare dati compilati tramite form allo strato Control) le varie viste associate ai buoni sconto.
 * Class VGestioneBuoni
 * @access public
 * @package View
 */
class VGestioneBuoni
{
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * VGestioneBuoni constructor.
     */
    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    /**
     * Metodo per mostrare i buoni dell'utente (con i dati ricevuti dall'apposito Controller).
     * @param $buoni
     * @param $utente
     * @throws SmartyException
     */
    public function mostraBuoni($buoni, $utente){
        $this->smarty->assign('path', $GLOBALS["path"]);
        $this->smarty->assign('buoni',$buoni);
        $this->smarty->assign('nome',$utente->getNome());
        $this->smarty->display('coupon-list.tpl');

    }

    /**
     * Metodo per riempire opportunamente con i campi ricevuti dal controllore l'email da inviare.
     * @param $buonoSconto
     * @return false|string
     * @throws SmartyException
     */
    public function datiBsEmail($buonoSconto){
        echo $buonoSconto->isPercentuale();
        $this->smarty->assign('path', $GLOBALS["path"]);
        $this->smarty->assign('codice',$buonoSconto->getCodice());
        $val="-".$buonoSconto->getAmmontare();
        echo $buonoSconto->isPercentuale();
        if ($buonoSconto->isPercentuale()==true){
            $this->smarty->assign('valore',$val."%");
        }
        else{
            $this->smarty->assign('valore',$val."€");
        }
        $this->smarty->assign('scadenza',$buonoSconto->getScadenza()->format('d-m-Y'));
        $this->smarty->assign('messaggio',$buonoSconto->getMessaggio());
        return $this->smarty->fetch('email-temp.tpl'); //da risolvere ancora
        //$this->smarty->display('email-temp.tpl'); //ok funziona

    }

    /**
     * Metodo per mostrare la schermata relativa alla creazione del buono.
     * @param string $nome
     * @throws SmartyException
     */
    public function mostraCreazioneBuono(string $nome){
        $this->smarty->assign('nome', $nome);
        $this->smarty->assign('path', $GLOBALS["path"]);
        $this->smarty->display('coupon-create.tpl');
    }


}