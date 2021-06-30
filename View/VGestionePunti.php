<?php
//require_once 'StartSmarty.php';

/**
 * VGestionePunti si occupa di riempire con i dati ricevuti dallo strato Control (o di inoltrare dati compilati tramite form allo strato Control) le varie viste che coinvolgono il meccanismo dei punti.
 * Class VGestionePunti
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
     * Metodo che recupera la schermata dell'email poi inviata tramite Controller.
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
        //$this->smarty->display('email-punti.tpl');        
        return $this->smarty->fetch('email-punti.tpl');
    }

    /**
     * Metodo per mostrare la schermata relativa all'inoltro dei punti.
     * @param $utente
     * @param $utenti
     * @throws SmartyException
     */
    public function mostraFormPunti($utente, $utenti){

        $this->smarty->assign("utenti", $utenti);
        $this->smarty->assign("puntimax", $utente->getPunti());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('regalapunti.tpl');
    }

    /**
     * Metodo che permette di mostrare la schermata relativa all'aggiunta di un premio.
     * @throws SmartyException
     */
    public function mostraAggiungiPremi(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign("nomeadmin", $gs->caricaUtente()->getNome());        
        $this->smarty->display('aggiungi-premi.tpl');
    }

    /**
     * Metodo che permette di mostrare la schermata dei dettagli del premio per l'utente.
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
     * Metodo che permette di mostrare la schermata dei dettagli del premio per l'admin.
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
     * Metodo per mostrare la schermata con la lista dei premi lato utente.
     * @param $premi
     * @throws SmartyException
     */
    public function mostraPremiUtente($premi){

        $this->smarty->assign("premi", $premi);
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('category-page(infinite-scroll)-premiUtente.tpl');        

    }

    /**
     * Metodo per mostrare la schermata con la lista dei premi lato admin.
     * @param $premi
     * @throws SmartyException
     */
    public function mostraPremiAdmin($premi){

        $this->smarty->assign("premi", $premi);
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('category-page(infinite-scroll)-premiAdmin.tpl');        

    }    

}