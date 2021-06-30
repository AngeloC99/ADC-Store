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
        $this->smarty->display('home.tpl');
    }

    public function mostraChiSiamo() {
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('about-page.tpl');
    }

    public function mostra401(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('401.tpl');
    }

    public function mostra404(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('404.tpl');
    }

    public function mostraCookie(){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->display('cookieTest.tpl');
    }

}