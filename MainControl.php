<?php
require_once "./autoloader.php";
require_once './configDB.php';
//echo CGestioneBuoni::invia();


// TESTING CGESTIONEPUNTI

//$premio = CGestionePunti::selezionaPremio('PRE60bdceeb42dde');
//echo var_dump($premio);

//$pm = FPersistentManager::getInstance();
//$utente = new EUtenteReg("Ada", "Bianchi", "adarossi@gmail.com", "pluto");
//$utente2 = new EUtenteReg("Angus", "Young", "angusyoung@gmail.com", "rock");
//$utente->setPunti(45);
//$utente2 = $pm->load("FUtenteReg","angusyoung@gmail.com","rock");
//$utente2->setPunti(50);
//$pm->store($utente);
//$pm->store($utente2);
//CGestionePunti::regalarePunti(20,'adarossi@gmail.com',$utente2);
//$premi = CGestionePunti::recuperaPremi();
//print_r($premi);
//$imm = new EImmagine("https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.carrefour.it%2Fon%2Fdemandware.static%2F-%2FSites-carrefour-master-catalog-IT%2Fdefault%2Fdw11998463%2Flarge%2FLATTEFRESCOAQCENROMAML500-0000080662594-1.png&f=1&nofb=1");
//CGestionePunti::aggiungiPremio('Padella','MarcaBuona','padella antiaderente 20cm',10,$imm,120);


//TESTING CGESTIONEPRODOTTI

//CGestioneProdotti::modificaPrezzo('PRO60bde87e4148a', 2.50);
//CGestioneProdotti::modificaQuantita('PRO60bde87e4148a', 60);
//$imm=new EImmagine('baci-perugina.jpg');
//$prod=new EProdotto('Baci Perugina','Perugina','baci perugina extra fondente',15,$imm,6.50,'dolci');
//CGestioneProdotti::aggiungiProdotto('Baci Perugina','Perugina','baci perugina extra fondente',15,$imm,6.50,'dolci');
//$prodotto = CGestioneProdotti::selezionaProdotto('PRO60bdee4383fb9');
//var_dump($prodotto);


//TESTING CRICE

//$arr = CRicerca::selezionaProdotto('PRO60bdf24cb1383');
//var_dump($arr);


// TESTING CGestioneBuoni

$admin = new EAmministratore("Chiara", "Romano", "xxx","pippo","xxx");
//$utente = new EUtenteReg("Ada", "Bianchi", "altraemail", "pluto");
CGestioneBuoni::inviaBuono($admin,$_POST['codice'],$_POST["percentuale"],$_POST["ammontare"],$_POST["mex"],$_POST["email"]);
