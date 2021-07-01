<?php

require_once "../autoloader.php";
require_once '../configDB.php';

$pm = FPersistentManager::getInstance();

$admin1 = new EAmministratore('David', 'Di Marco','david.admin@gmail.com','secret');
$admin2 = new EAmministratore('Angelo', 'Casciani','angelo.admin@gmail.com','secret');
$admin3 = new EAmministratore('Chiara', 'Romano','chiara.admin@gmail.com','secret');
$admin4 = new EAmministratore('Serafino', 'Cicerone','serafino.admin@gmail.com','secret');
$pm->store($admin1);
$pm->store($admin2);
$pm->store($admin3);
$pm->store($admin4);

$utente1 = new EUtenteReg("Angelo", "Casciani", "angeloc25999@gmail.com", "secret");
$utente2 = new EUtenteReg("David", "Di Marco", "davidmarcus35@gmail.com", "secret");
$utente3 = new EUtenteReg("Chiara", "Romano", "romanochiara229@gmail.com", "secret");
$utente4 = new EUtenteReg("Roberto", "Mancini", "robymancio@gmail.com", "nazionale");
$utente5 = new EUtenteReg("Alberto", "Angela", "albyangela@gmail.com", "roma");
$utente6 = new EUtenteReg("Piero", "Angela", "pieroangela@outlook.com", "scienza");
$utente7 = new EUtenteReg("Carlo", "Cracco", "craccochef@libero.it", "cucina");
$utente8 = new EUtenteReg("Cristiano", "Ronaldo", "cr7@outlook.com", "calcio");
$utente9 = new EUtenteReg("Antonino", "Cannavacciuolo", "antocannavacciulo@live.it", "cucina");
$utente10 = new EUtenteReg("Angus", "Young", "angusyoung@gmail.com", "rock");

$utente1->setPunti(300);
$utente2->setPunti(300);
$utente3->setPunti(300);
$utente4->setPunti(15);
$utente5->setPunti(50);
$utente6->setPunti(150);
$utente7->setPunti(60);
$utente8->setPunti(20);
$utente9->setPunti(50);
$utente10->setPunti(70);

$pm->store($utente1);
$pm->store($utente2);
$pm->store($utente3);
$pm->store($utente4);
$pm->store($utente5);
$pm->store($utente6);
$pm->store($utente7);
$pm->store($utente8);
$pm->store($utente9);
$pm->store($utente10);

$buono1 = new EBuonoSconto(true,20);
$buono2 = new EBuonoSconto(false,20);
$buono3 = new EBuonoSconto(false,5);
$buono4 = new EBuonoSconto(true,50);
$buono4 = new EBuonoSconto(false,10);
$buono5 = new EBuonoSconto(false,5);
$buono6 = new EBuonoSconto(true,25);
$buono7 = new EBuonoSconto(false,10);
$buono8 = new EBuonoSconto(false,5);

$pm->store($buono1, $utente1->getEmail());
$pm->store($buono2, $utente1->getEmail());
$pm->store($buono3, $utente1->getEmail());
$pm->store($buono4, $utente1->getEmail());
$pm->store($buono5, $utente2->getEmail());
$pm->store($buono6, $utente2->getEmail());
$pm->store($buono7, $utente2->getEmail());
$pm->store($buono8, $utente2->getEmail());



$ind1 = new EIndirizzo("Via Palmegiani", 169, "Rieti", "Ri", "02100");
$ind2 = new EIndirizzo("Via Roma", 144, "Civitella Roveto", "Aq", "67054");
$ind3 = new EIndirizzo("Via Benedetto Croce", 1, "Civitella Roveto", "Aq", "67054");
$ind4 = new EIndirizzo("Via Piave", 45, "Rieti", "Ri", "02100");
$ind5 = new EIndirizzo("Via Vetoio", 209, "L'Aquila", "Aq", "67100");
$ind6 = new EIndirizzo("Via Romanini", 169, "Avezzano", "Aq", "67051");
$ind7 = new EIndirizzo("Via Barattelli", 169, "L'Aquila", "Aq", "02100");
$ind8 = new EIndirizzo("Via Fratelli Sebastiani", 32, "Rieti", "Ri", "02100");
$ind9 = new EIndirizzo("Via Garibaldi", 15, "Rieti", "Ri", "02100");
$ind10 = new EIndirizzo("Via Mazzini", 8, "Santa Rufina", "Ri", "02100");
$ind11 = new EIndirizzo("Via Saletta", 2, "Antrodoco", "Ri", "02013");
$pm->salvaIndirizzoUtente($ind10, "angeloc25999@gmail.com");
$pm->salvaIndirizzoUtente($ind1, "angeloc25999@gmail.com");
$pm->salvaIndirizzoUtente($ind2, "davidmarcus35@gmail.com");
$pm->salvaIndirizzoUtente($ind3, "romanochiara229@gmail.com");
$pm->salvaIndirizzoUtente($ind3, "davidmarcus35@gmail.com");
$pm->salvaIndirizzoUtente($ind2, "romanochiara229@gmail.com");
$pm->salvaIndirizzoUtente($ind4, "robymancio@gmail.com");
$pm->salvaIndirizzoUtente($ind5, "albyangela@gmail.com");
$pm->salvaIndirizzoUtente($ind6, "pieroangela@outlook.com");
$pm->salvaIndirizzoUtente($ind7, "craccochef@libero.it");
$pm->salvaIndirizzoUtente($ind8, "cr7@outlook.com");
$pm->salvaIndirizzoUtente($ind9, "antocannavacciulo@live.it");
$pm->salvaIndirizzoUtente($ind2, "angusyoung@gmail.com");

$carta1 = new ECartaCredito("Angelo Casciani", "123456789012345678", "MasterCard", new DateTime('January 2027'), 123, 800.5);
$carta2 = new ECartaCredito("David Di Marco", "7849362749581094837", "Visa", new DateTime('June 2027'), 653, 800.5);
$carta3 = new ECartaCredito("Chiara Romano", "2637485192039474893", "AmericanExpress", new DateTime('October 2028'), 246, 800.5);
$carta4 = new ECartaCredito("Angelo Casciani", "5249362722281094837", "Visa", new DateTime('October 2028'), 423, 500.5);
$carta5 = new ECartaCredito("David Di Marco", "393456789056345678", "AmericanExpress", new DateTime('January 2028'), 543, 500.5);
$carta6 = new ECartaCredito("Chiara Romano", "7482934192039474893", "MasterCard", new DateTime('June 2027'), 757, 500.5);
$carta7 = new ECartaCredito("Roberto Mancini", "938256789012345678", "MasterCard", new DateTime('January 2027'), 123, 100.5);
$carta8 = new ECartaCredito("Cristiano Ronaldo", "7263462749581094837", "AmericanExpress", new DateTime('June 2027'), 653, 25000.0);
$carta9 = new ECartaCredito("Piero Angela", "9462885192039474893", "AmericanExpress", new DateTime('October 2028'), 246, 500.0);
$carta10 = new ECartaCredito("Carlo Cracco", "234126789012345678", "MasterCard", new DateTime('January 2027'), 123, 350.5);
$carta11 = new ECartaCredito("Antonino Cannavacciuolo", "7456262749581094837", "Visa", new DateTime('June 2027'), 653, 400.0);
$carta12 = new ECartaCredito("Angus Young", "3452685192039474893", "AmericanExpress", new DateTime('October 2028'), 246, 600.0);

$pm->salvaCartaUtente($carta1, "angeloc25999@gmail.com");
$pm->salvaCartaUtente($carta4, "angeloc25999@gmail.com");
$pm->salvaCartaUtente($carta2, "davidmarcus35@gmail.com");
$pm->salvaCartaUtente($carta5, "davidmarcus35@gmail.com");
$pm->salvaCartaUtente($carta3, "romanochiara229@gmail.com");
$pm->salvaCartaUtente($carta6, "romanochiara229@gmail.com");
$pm->salvaCartaUtente($carta7, "robymancio@gmail.com");
$pm->salvaCartaUtente($carta9, "albyangela@gmail.com");
$pm->salvaCartaUtente($carta9, "pieroangela@outlook.com");
$pm->salvaCartaUtente($carta10, "craccochef@libero.it");
$pm->salvaCartaUtente($carta8, "cr7@outlook.com");
$pm->salvaCartaUtente($carta11, "antocannavacciulo@live.it");
$pm->salvaCartaUtente($carta12, "angusyoung@gmail.com");