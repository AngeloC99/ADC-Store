<?php

//require('smarty-libs/Smarty.class.php');

class VLogin extends Smarty {

	    public function __construct() {

	    	$smarty = StartSmarty::configuration();


	public function showResults(){

		$smarty->display('loginfe.tpl');
	}