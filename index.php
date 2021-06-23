<?php
require_once "autoloader.php";
require_once "configDB.php";
require('StartSmarty.php');

//$v = new VHome();
//$v->setTemplate('home.tpl');
// Testing VBuonoSconto
//$v = new VGestioneCarrello();
//$bs=new EBuonoSconto(true,10,"ciao ciao");
//$v->datiBsEmail($bs);
//$v->mostraCreazioneBuono();
//CGestioneCarrello::recuperaCarrello("Car60c065edcc2f7");

/*
//TESTING VBuoni
$v=new VGestioneBuoni();
$utente=new EUtenteReg('chiara','romano','romanochiara229@gmail.com','pippo');
$bs1=new EBuonoSconto(true,10);
$bs2=new EBuonoSconto(false,50);
$bs3=new EBuonoSconto(true,17);

$buoni=array($bs1,$bs2,$bs3);
$utente->setBuoniSconto($buoni);
CGestioneBuoni::recuperaBuoni($utente);
?>*/

$ind = new EIndirizzo("Via Salamanca","323", "Rieti","Ri", "02100",false);
//CGestioneCarrello::procediOrdine("Car60c065edcc2f7", "adarossi@gmail.com");
CGestioneCarrello::procediAcquisto("Car60c065edcc2f7", $ind);

//Testing mail per punti

$v = new VGestionePunti();
$v->mostraFormPunti();
//$utente=new EUtenteReg('chiara','romano','romanochiara229@gmail.com','pippo');
