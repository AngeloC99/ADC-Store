<?php

//require('../Smarty/Smarty.class.php');

class VLogin extends Smarty {

    public function __construct (){

        $this->smarty = StartSmarty::configuration();
    }

	public function showResults(Smarty $smarty){

		$this->$smarty->display('loginfe.tpl');
	}

}