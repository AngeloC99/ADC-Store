<?php

/**
 * VGestioneCarrello si occupa di riempire con i dati ricevuti dallo strato Control le varie viste associate ai carrelli
 * e agli ordini.
 * Class VGestioneCarrello
 * @access public
 * @package View
 */

class VGestioneCarrello {
    /**
     * @var Smarty
     */
    private Smarty $smarty;

    /**
     * VGestioneCarrello constructor.
     */
    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Metodo che riempie con i dati ricevuti e visualizza il template del carrello della sessione.
     * @param $carrello
     * @param $arrProdotti
     * @throws SmartyException
     */
    public function mostraCarrello($carrello, $arrProdotti){
        $this->smarty->assign('prodotti', $arrProdotti);
        $this->smarty->assign('cart',$carrello->getNome());
        $this->smarty->assign('prezzoTot', $carrello->getPrezzoTot());
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('cart.tpl');
    }

    /**
     * Metodo che riempie con i dati ricevuti e visualizza il template per procedere ad un ordine.
     * @param ECarrello $carrello
     * @param string $mailutente
     * @param array $arrProdotti
     * @param array $arrIndirizzi
     * @param array $arrCarte
     * @param array $arrBuoni
     * @throws SmartyException
     */
    public function compilaOrdine(ECarrello $carrello, string $mailutente, array $arrProdotti, array $arrIndirizzi, array $arrCarte, array $arrBuoni){
        $this->smarty->assign('prodotti', $arrProdotti);
        $this->smarty->assign('prezzoTot', $carrello->getPrezzoTot());
        $this->smarty->assign('indirizzi', $arrIndirizzi);
        $this->smarty->assign('carte', $arrCarte);
        $this->smarty->assign('buoni', $arrBuoni);
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('checkout.tpl');
    }

    /**
     * Metodo che riempie con i dati ricevuti e visualizza il template di riepilogo dell'ordine.
     * @param EOrdine $ordine
     * @param string $nome
     * @param string $cognome
     * @param string $telefono
     * @param array $arrProdotti
     * @throws SmartyException
     */
    public function mostraOrdine(EOrdine $ordine, string $nome, string $cognome, string $telefono, array $arrProdotti) {
        $this->smarty->assign('prodotti', $arrProdotti);
        $this->smarty->assign('idOrdine',$ordine->getId());
        $this->smarty->assign('dataOrdine',$ordine->getDataAcquisto()->format('d-m-y'));
        $this->smarty->assign('dataConsegna',$ordine->getDataAcquisto()->add(new DateInterval('P10D'))
                                                            ->format('d-m-y'));
        $this->smarty->assign('indirizzo', $ordine->getIndirizzo());
        $this->smarty->assign('prezzoTot', $ordine->getPrezzoTotale());
        $this->smarty->assign('nomeUtente', $nome." ".$cognome);
        $this->smarty->assign('telefono', $telefono);
        $this->smarty->assign('idTransazione', uniqid("TR"));
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('order-success.tpl');
    }

    /**
     * Metodo che riempie con i dati ricevuti il template da utilizzare per le mail.
     * @param EOrdine $ordine
     * @param string $nome
     * @param string $cognome
     * @param ECarrello $carrello
     * @param array $arrProdotti
     * @return false|string
     * @throws SmartyException
     */
    public function ordineEmail(EOrdine $ordine, string $nome, string $cognome, ECarrello $carrello, array $arrProdotti) {
        $this->smarty->assign('prodotti', $arrProdotti);
        $this->smarty->assign('idOrdine',$ordine->getId());
        $this->smarty->assign('prezzoCarrello',$carrello->getPrezzoTot());
        $this->smarty->assign('dataOrdine',$ordine->getDataAcquisto()->sub(new DateInterval('P10D'))->format('d-m-y'));
        $this->smarty->assign('dataConsegna',$ordine->getDataAcquisto()->add(new DateInterval('P10D'))
                                                            ->format('d-m-y'));
        $this->smarty->assign('indirizzo', $ordine->getIndirizzo());
        $this->smarty->assign('prezzoTot', $ordine->getPrezzoTotale());
        $this->smarty->assign('nomeUtente', $nome." ".$cognome);
        $this->smarty->assign('path', $GLOBALS["path"]);

        return $this->smarty->fetch('email-order-success.tpl');
    }

    /**
     * Metodo che riempie con i dati ricevuti e visualizza il template di gestione dei carrelli salvati.
     * @param EUtenteReg $utente
     * @param array $arrCarrelli
     * @throws SmartyException
     */
    public function mostraCarrelliPreferiti(EUtenteReg $utente, array $arrCarrelli) {
        $this->smarty->assign('carrelli', $arrCarrelli);
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('carrelliPreferiti.tpl');
    }
}