<?php
require_once 'StartSmarty.php';
class VGestioneBuoni
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }
    public function mostraBuoni($buoni,$utente){
        $this->smarty->assign('path', $GLOBALS["path"]);
        $this->smarty->assign('buoni',$buoni);
        $this->smarty->assign('nome',$utente->getNome());
        $this->smarty->display('coupon-list.tpl');

    }
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

    public function mostraCreazioneBuono(){
        $this->smarty->assign('path', $GLOBALS["path"]);
        $this->smarty->display('coupon-create.tpl');
    }

}