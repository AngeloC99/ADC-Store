<?php

require_once "../autoloader.php";
require_once '../configDB.php';

$imm = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
$prod1 = new EProdotto("Latte","Centrale di Roma","Latte intero", 200, $imm, 1.50, "Latte");
$prod2 = new EProdotto("Petto di pollo","Amadori","Pollo di alta qualità", 50, $imm, 3.50, "Carne");
$prod3 = new EProdotto("Yogurt","Muller","Yogurt alla vaniglia", 80, $imm, 0.70, "Yogurt");

$admin = new EAmministratore("Mario", "Rossi", "mariorossi@gmail.com", "pippo");
$admin2 = new EAmministratore("Luca", "Rossi", "lucarossi@gmail.com", "paperino");

//$fadmin = new FAmministratore();
//$fadmin->store($admin);
//$fadmin->store($admin2);


//$admin3 = $fadmin->load("lucarossi@gmail.com");
//print($admin3->getNome());
//$fadmin->delete("lucarossi@gmail.com");
//$bool = $fadmin->exist("mariorossi@gmail.com");
//print($bool);

$utente = new EUtenteReg("Ada", "Bianchi", "adarossi@gmail.com", "pluto");
$utente2 = new EUtenteReg("Angus", "Young", "angusyoung@gmail.com", "rock");
$db = new FPersistentManager();
$bool = $db->exist("angusyoung@gmail.com", "FUtenteReg");
print($bool);
$db->update($utente2, $utente);
//$db->store($utente);
//$futente->store($utente);
//$db->delete("adarossi@gmail.com","FUtenteReg");
//$ada = $db->load("adarossi@gmail.com", "FUtenteReg");
//print($ada->getNome());






