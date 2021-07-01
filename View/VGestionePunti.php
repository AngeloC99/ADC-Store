<?php

/**
 * VGestionePunti si occupa di riempire con i dati ricevuti dallo strato Control le varie viste associate alla
 * gestione dei punti dell'utente e dei premi con essi acquistabili.
 * Class VGestionePunti
 * @access public
 * @package View
 */

class VGestionePunti
{
    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * VGestionePunti constructor.
     */
    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    /**
     * Metodo che assegna i dati al template della mail per il passaggio di punti da un utente a un altro.
     * @param int $punti
     * @param string $nome
     * @param string $cognome
     * @param string $messaggio
     * @return false|string
     * @throws SmartyException
     */
    public function datiPuntiEmail(int $punti, string $nome, string $cognome, string $messaggio){

        $this->smarty->assign('punti', $punti);
        $this->smarty->assign('nome',$nome);
        $this->smarty->assign('cognome',$cognome);
        $this->smarty->assign('messaggio', $messaggio);
        return $this->smarty->fetch('email-punti.tpl');
    }

    /**
     * Mostra il template con la form tramite cui un utente può regalare punti ad un altro.
     * @param $utente
     * @throws SmartyException
     */
    public function mostraFormPunti($utente){

        $this->smarty->assign("utenti");
        $this->smarty->assign("puntimax", $utente->getPunti());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('regalapunti.tpl');
    }

    /**
     * Mostra la form con cui l'amministratore può inserire un premio.
     * @throws SmartyException
     */
    public function mostraAggiungiPremi(){

        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign("nomeadmin", $gs->caricaUtente()->getNome());        
        $this->smarty->display('aggiungi-premi.tpl');
    }

    /**
     * Metodo che permette la visualizzazione dei dettagli di un premio per un utente registrato.
     * @param $premio
     * @param $arrIndirizzi
     * @throws SmartyException
     */
    public function mostraDettagliPremioUser($premio, $arrIndirizzi){

        $gs = CGestioneSessioni::getInstance();
        $user = $gs->caricaUtente();

        $this->smarty->assign('indirizzi', $arrIndirizzi);
        $this->smarty->assign('nome', $premio->getNome());
        $this->smarty->assign('descrizione', $premio->getDescrizione());
        $this->smarty->assign('marca', $premio->getMarca());
        $this->smarty->assign('punti', $premio->getPrezzoInPunti());
        $this->smarty->assign('quantita', $premio->getQuantita());
        $this->smarty->assign('id', $premio->getId());
        $this->smarty->assign('mime', $premio->getImmagine()->getFormato());
        $this->smarty->assign('dati', $premio->getImmagine()->getByte());
        $this->smarty->assign('puntiutente', $gs->caricaUtente()->getPunti());


        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('prize-page(accordian)Utente.tpl');

    }

    /**
     * Metodo che permette la visualizzazione dei dettagli di un premio per un amministratore.
     * @param $premio
     * @throws SmartyException
     */
    public function mostraDettagliPremioAdmin($premio){

        $this->smarty->assign('nome', $premio->getNome());
        $this->smarty->assign('descrizione', $premio->getDescrizione());
        $this->smarty->assign('marca', $premio->getMarca());
        $this->smarty->assign('punti', $premio->getPrezzoInPunti());
        $this->smarty->assign('quantita', $premio->getQuantita());
        $this->smarty->assign('id', $premio->getId());
        $this->smarty->assign('mime', $premio->getImmagine()->getFormato());
        $this->smarty->assign('dati', $premio->getImmagine()->getByte());


        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('prize-page(accordian)Admin.tpl');

    }

    /**
     * Mostra la lista dei premi attualmente disponibili all'utente.
     * @param $premi
     * @throws SmartyException
     */
    public function mostraPremiUtente($premi){

        $this->smarty->assign("premi", $premi);
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('category-page(infinite-scroll)-premiUtente.tpl');        

    }

    /**
     * Mostra la lista dei premi attualmente disponibili all'amministratore.
     * @param $premi
     * @throws SmartyException
     */
    public function mostraPremiAdmin($premi){

        $this->smarty->assign("premi", $premi);
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('category-page(infinite-scroll)-premiAdmin.tpl');        

    }    

}