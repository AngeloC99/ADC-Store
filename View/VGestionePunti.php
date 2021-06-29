<?php
require_once 'StartSmarty.php';

class VGestionePunti
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    public function datiPuntiEmail(int $punti, string $nome, string $cognome, string $messaggio){

        $this->smarty->assign('punti', $punti);
        $this->smarty->assign('nome',$nome);
        $this->smarty->assign('cognome',$cognome);
        $this->smarty->assign('messaggio', $messaggio);
        //$this->smarty->display('email-punti.tpl');        
        return $this->smarty->fetch('email-punti.tpl');
    }

    public function mostraFormPunti(){

        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("puntimax", $gs->caricaUtente()->getPunti());        
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('regalapunti.tpl');
    }

    public function mostraAggiungiPremi(){

        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign("nomeadmin", $gs->caricaUtente()->getNome());        
        $this->smarty->display('aggiungi-premi.tpl');
    }

    public function mostraDettagliPremioUser($premio){

        $gs = CGestioneSessioni::getInstance();
        $user = $gs->caricaUtente();

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

    public function mostraPremiUtente($premi){

        $this->smarty->assign("premi", $premi);
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('category-page(infinite-scroll)-premiUtente.tpl');        

    }

    public function mostraPremiAdmin($premi){

        $this->smarty->assign("premi", $premi);
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('category-page(infinite-scroll)-premiAdmin.tpl');        

    }    

}