<?php

require("C:\Users\\rommy\public_html\PHP\StartSmarty.php");
class VGestioneBuoni
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }
    public function datiBsEmail(EBuonoSconto $buonoSconto){
        $this->smarty->assign('codice',$buonoSconto->getCodice());
        $val="-".$buonoSconto->getAmmontare();
        if ($buonoSconto->isPercentuale()==true){
            $this->smarty->assign('valore',$val."%");
        }
        else{
            $this->smarty->assign('valore',$val."€");
        }
        $this->smarty->assign('scadenza',$buonoSconto->getScadenza()->format('d-m-Y'));
        $this->smarty->assign('messaggio',$buonoSconto->getMessaggio());
        return $this->smarty->fetch('email-temp.tpl'); //da risolvere ancora
        //$this->smarty->display('email-temp.tpl'); ok funziona



    }



    public function mostraCreazioneBuono(){
        $s='stringadiprova';
        $this->smarty->assign('codice',$s);
        $this->smarty->display('coupon-create.tpl');
    }

}