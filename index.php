<?php
require_once "autoloader.php";
require_once "configDB.php";
require_once("StartSmarty.php");

/*
$v = new VHome();
$v->setTemplate('home.tpl');
$v=new VGestioneBuoni();
//$v->mostraCreazioneBuono();

$bs=new EBuonoSconto(true,10,"ciao ciao");
$v->datiBsEmail($bs);
*/

CGestioneCarrello::recuperaCarrello("Car60c065edcc2f7");

