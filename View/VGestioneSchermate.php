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
        $this->smarty->display('aggiungi-premi.tpl');


    }

}