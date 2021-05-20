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

// Testing EProdotto ed ECarrello
$imm = new EImmagine(".\Entity\latteRoma.jpg");
$prod1 = new EProdotto("Latte","Centrale di Roma","Latte intero", 200, $imm, 1.50, "Latte");
$prod2 = new EProdotto("Petto di pollo","Amadori","Pollo di alta qualità", 50, $imm, 3.50, "Carne");
$prod3 = new EProdotto("Yogurt","Muller","Yogurt alla vaniglia", 80, $imm, 0.70, "Yogurt");
$carrello = new ECarrello();
$carrello->setDefault(true);
$carrello->aggiungiProdotto($prod1, 2);
$carrello->aggiungiProdotto($prod2, 1);
$carrello->aggiungiProdotto($prod3, 3);
print_r($carrello);