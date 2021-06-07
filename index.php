<?php
require_once "autoloader.php";
/*
$v = new VHome();
$v->setTemplate('home.tpl');*/
$v=new VGestioneBuoni();
//$v->mostraCreazioneBuono();

$bs=new EBuonoSconto(true,10,"ciao ciao");
$v->datiBsEmail($bs);

