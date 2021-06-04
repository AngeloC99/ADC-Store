<?php

//require('../Smarty/Smarty.class.php');

class VRicerca extends Smarty {

    private Smarty $smarty;

    public function __construct (){

        $this->smarty = StartSmarty::configuration();
    }

    public function showProducts(){

        $this->smarty->display('category-page(infinite-scroll).tpl');
        //$this->smarty->display('loginfe.tpl');

    }



}