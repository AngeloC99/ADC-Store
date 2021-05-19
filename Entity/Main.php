<?php

require_once "Utility.php";


$utente = new EUtenteReg("mario", "rossi", "mariorossi@gmail.com", "password");
print_r($utente->getCarteSalvate());
$data = new DateTime("now");
$utente->inserisciCarta("mario", "123", "visa", $data, 456,87.50);
$utente->inserisciCarta("Giovanni Rossi", "87329873284732", "MasterCard", new DateTime(2022-01-31), 123,305.50);
print_r($utente->getCarteSalvate());
$carta1 = $utente->getCarteSalvate()["87329873284732"];

// Testing ECartaCredito
print "L'ammontare predente nella nuova carta è: $".$carta1->getAmmontare();
$carta1->setAmmontare(200.10);
print "\nNuovo ammontare: $".$carta1->getAmmontare();

// Testing EIndirizzo
$utente->setIndirizzoPredefinito("Via Roma", 147, "Rieti", "Rieti", "02100", true);
print_r($utente->getIndirizzoPredefinito());