<?php
require_once 'StartSmarty.php';


class VGestioneSchermate
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }    

    public function showHome(){

        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('regalapunti.tpl');
        //CGestionePunti::selezionaPremio('PRE60d608a606b10');
        //$this->smarty->display('home.tpl');
        //CGestionePunti::recuperaPremi();
        //CGestioneProdotti::recuperaProdotti();
       //CGestionePunti::recuperaPremi();
        //$this->smarty->display('loginfe.tpl');
        //CGestioneSchermate::apriProfilo();
        //$this->smarty->display("user-list.tpl");
        //CGestioneSchermate::recuperaLogin();
    }




}