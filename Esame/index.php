<?php
require_once 'autoloader.php';
require_once 'StartSmarty.php';

//$v = new VLogin();

//$smarty = StartSmarty::configuration();

//$v->showResults($smarty);

//$smarty->display('loginfe.tpl');

$r = new VRicerca();

$r->showProducts();

