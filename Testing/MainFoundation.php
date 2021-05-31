<?php

require_once "../autoloader.php";
require_once '../configDB.php';


/**
$imm = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
$prod1 = new EProdotto("Latte","Centrale di Roma","Latte intero", 200, $imm, 1.50, "Latte");
$prod2 = new EProdotto("Petto di pollo","Amadori","Pollo di alta qualità", 50, $imm, 3.50, "Carne");
$prod3 = new EProdotto("Yogurt","Muller","Yogurt alla vaniglia", 80, $imm, 0.70, "Yogurt");

/**
$imm1 = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
$imm2 = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
$imm3 = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
$prod1 = new EProdotto("Latte","Centrale di Roma","Latte intero", 200, $imm1, 1.50, "Latte");
$prod2 = new EProdotto("Petto di pollo","Amadori","Pollo di alta qualità", 50, $imm2, 3.50, "Carne");
$prod3 = new EProdotto("Yogurt","Muller","Yogurt alla vaniglia", 80, $imm3, 0.70, "Yogurt");
*/

//$admin = new EAmministratore("Mario", "Rossi", "mariorossi@gmail.com", "pippo");
//$admin2 = new EAmministratore("Luca", "Rossi", "lucarossi@gmail.com", "paperino");

//$db = new FPersistentManager();
//$db->store($admin);
//$db->store($admin2);


//$admin3 = $db->load("FAmministratore", "lucarossi@gmail.com");
//print($admin3->getNome());
//$db->delete("FAmministratore", "lucarossi@gmail.com");
//$bool = $fadmin->exist("mariorossi@gmail.com");
//print($bool);

$utente = new EUtenteReg("Ada", "Bianchi", "adarossi@gmail.com", "pluto");
//$utente2 = new EUtenteReg("Angus", "Young", "angusyoung@gmail.com", "rock");

//$bool = $db->exist("FUtenteReg", "angusyoung@gmail.com");
//print($bool);
//$futente->store($utente);
//$bool = $db->exist("FUtenteReg", "angusyoung@gmail.com");
//print($bool);
//$db->update($utente2, $utente);
//$db->store($utente);
//$db->store($utente2);
//$futente->store($utente);
//$db->delete("adarossi@gmail.com","FUtenteReg");
//$ada = $db->load("adarossi@gmail.com", "FUtenteReg");
//print($ada->getNome());
//$utenti = $db->prelevaUtenti();
//print_r($utenti);



//Testing classe FProdotto:
/**
$pm=new FPersistentManager();
$imm=new EImmagine('https://www.centralelattediroma.it/wp-content/uploads/2019/01/lattefresco_prova2.png');
$id = $imm->getId();
echo $id;
$imm2=new EImmagine('https://www.zooplus.it/magazine/wp-content/uploads/2020/10/1-32-768x512.jpg');
$prod1 = new EProdotto("Latte","Centrale di Roma","Latte intero", 200, $imm, 1.50, "Latte");
$pm->store($prod1);
echo $pm->exist('FProdotto',$prod1->getId());
$imm_rec=$pm->load('FImmagine',$id);
echo $imm_rec->getNome();
echo $imm_rec->getSize();

//'https://www.zooplus.it/magazine/wp-content/uploads/2020/10/1-32-768x512.jpg'
//$ris=$pr->exist($imm2->getId(),null,null,'FImmagine');
//$pm->store($prod1);
//$ris2=$pr->delete('FImmagine',$prod1->getImmagine()->getId());
//echo $imm->getId();
//echo $ris2;
//$premio=new EPremio('Penna','Bic','Penna Bic di colore Nero',3,$imm,10);
//$pm->store($premio);
  */


// Testing classe FIndirizzo

$indirizzo = new EIndirizzo("Via Roma", 169, "Avezzano", "Aq", "67054", true);
$ind = new EIndirizzo("Via Strampelli", 144, "Rieti", "Ri", "02100", true);
$ind1 = new EIndirizzo("Via Milano", 1, "Roma", "Rm", "00118", false);
$ind2 = new EIndirizzo("Via Strampelli", 144, "Rieti", "Ri", "02100", false);
//$db->store($ind1);
//$db->store($ind2);
//$db->store($indirizzo);
//print $db->exist("FIndirizzo", "Via Milano", "1", "00118");
//print "\n";
//$ind1 = $db->load("FIndirizzo", "Via Milano", "1", "00118");
//var_dump($ind1);
//$indirizzi = $db->prelevaIndirizzi();
//print_r($indirizzi);
//$db->delete("FIndirizzo", "Via Roma", "169", "67054");
//$ind = new EIndirizzo("Via Milano", 1, "L?Aquila", "Aq", "02180", false);
//$db->update($ind);

//FPersistentManager::update($indirizzo);

// Testing classe FCartaCredito

$carta1 = new ECartaCredito("Roberto Roberti", "1234567891234567", "MasterCard", new DateTime('January 2025'), 123, 350.5);
//$carta3 = new ECartaCredito("Mario Mari", "2638475910293485", "AmericanExpress", new DateTime('June 2023'), 653, 746.0);
//FCartaCredito::store($carta1);
//FCartaCredito::store($carta3);
//print FCartaCredito::exist( "1234567891234567");
//$carta1 = FCartaCredito::load("1234567891234567");
//var_dump($carta1);
//$carte = FCartaCredito::prelevaCarte();
//print_r($carte);
//FCartaCredito::delete("2638475910293485");
//$carta = new ECartaCredito("Roberto Filistini", "1234567891234567", "AmericanExpress", new DateTime('October 2028'), 246, 1000.5);
//FCartaCredito::update($carta);

// Testing classe FCarrello
/*
$carrello = new ECarrello();
$carrello->aggiungiProdotto($prod1, 4);
$carrello->aggiungiProdotto($prod2, 1);
$carrello->aggiungiProdotto($prod3, 2);
$carrello->aggiungiProdotto($prod1, 7);

$db->store($prod1);
$db->store($prod2);
$db->store($prod3);
$db->store($utente);
$db->store($indirizzo);
$db->store($ind);

$db->store($carrello, $utente->getEmail());
print "\n";
print FCarrello::exist($carrello->getId());


// Testing classe FOrdine

$ordine1 = new EOrdine($carrello, $ind);
$ordine2 = new EOrdine($carrello, $indirizzo);


$db->store($ordine1);
$db->store($ordine2);
print "\n";
print FOrdine::exist( $ordine1->getId());
*/

// Testing dei metodi che coinvolgono più tabelle FUtenteReg

//$db->store($utente);
//FUtenteReg::salvaIndirizzo($indirizzo,$utente->getEmail());
//FUtenteReg::salvaCarta($carta1,$utente->getEmail());
//FUtenteReg::eliminaIndirizzo($indirizzo->getVia(),$indirizzo->getNumero(), $indirizzo->getCap(), $utente->getEmail());
//FUtenteReg::salvaIndirizzo($ind,$utente->getEmail());
//var_dump(FUtenteReg::prelevaIndirizzi($utente->getEmail()));

/*
// Testing classe FBuonoSconto
$db=new FPersistentManager();
$buono=new EBuonoSconto(true,15);
$buono2=new EBuonoSconto(false,10);
$buono3=new EBuonoSconto(true,50);
$db->store($buono,$utente->getEmail());
/*$ris=$db->exist('FBuonoSconto',$buono->getCodice());
echo $ris;
echo $db->delete('FBuonoSconto',$buono->getCodice());

$db->store($buono2,$utente->getEmail());
$db->store($buono3,$utente->getEmail());
print_r($db->prelevaBuoni());
$brec=$db->load('FBuonoSconto',$buono3->getCodice());
var_dump($brec);*/

//Testing classe FImmagine

$db=new FPersistentManager();
/*$imm=new EImmagine('padella.jpg');
$db->store($imm);
$imrec=$db->load('FImmagine',$imm->getId());
var_dump($imrec);
 */
 // Testing FProdotto:
$imm=new EImmagine('https://www.centralelattediroma.it/wp-content/uploads/2019/01/lattefresco_prova2.png');
//var_dump($imm);  //funziona solo con particolari uml!!
$prod=new EProdotto('Latte','Centrale del latte di Roma','latte fresco',25,$imm,0.80,'latte');
echo $db->exist('FProdotto',$prod->getId());
$db->store($prod);


