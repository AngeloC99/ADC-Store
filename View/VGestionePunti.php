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
        $this->smarty->display('regalapunti.tpl');
    }

    public function mostraAggiungiProd(){
        $this->smarty->display('aggiungi-premi.tpl');
    }    

}