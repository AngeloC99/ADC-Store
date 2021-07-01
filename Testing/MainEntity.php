<?php

require_once "../autoloader.php";


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


// Testing EProdotto ed ECarrello
$imm = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
//print_r($imm);
$prod1 = new EProdotto("Latte","Centrale di Roma","Latte intero", 200, $imm, 1.50, "Latte");
$prod2 = new EProdotto("Petto di pollo","Amadori","Pollo di alta qualità", 50, $imm, 3.50, "Carne");
$prod3 = new EProdotto("Yogurt","Muller","Yogurt alla vaniglia", 80, $imm, 0.70, "Yogurt");
$carrello = new ECarrello();
$carrello->aggiungiProdotto($prod1, 5);
$carrello->aggiungiProdotto($prod2, 1);
$carrello->aggiungiProdotto($prod3, 4);
print_r($carrello);
print("\n");

//print $imm->getByte();

// Testing metodo ConfermaOrdine()

$utente2 = new EUtenteReg("gianni", "rossi", "giannirossi@gmail.com", "password");
$utente2->setPunti(100);
$indirizzo = new EIndirizzo("Via Roma", 169, "Avezzano", "Aq", "67054", true);
$carta = new ECartaCredito("Giovanni Rossi", "87329873284732", "MasterCard", new DateTime(2022-01-31), 123,305.50);
print("Ammontare originale: ".$carta->getAmmontare());
print("\n");
print("punti originali: ".$utente2->getPunti());
print("\n");
$ordine = new EOrdine($carrello,$indirizzo);
print("Prezzo totale dell'ordine: ".$ordine->getPrezzoTotale());
print("\n");
print("\n");
print("Nuovo ammontare: ".$carta->getAmmontare());
print("\n");
print("Nuovi punti: ".$utente2->getPunti());
print("\n");


