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
        //$this->smarty->display('category-page(infinite-scroll) - premi.tpl');
        //CGestionePunti::selezionaPremio('PRE60d5ec48d9621');
        $this->smarty->display('home.tpl');
        //CGestionePunti::recuperaPremi();
        //CGestioneProdotti::recuperaProdotti();
       //CGestionePunti::recuperaPremi();
    }
}