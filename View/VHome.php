<?php


class VHome
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }
    public function mostraHome(){
        $this->smarty->display('home.tpl');
    }



}