<?php

require_once "Utility.php";


$utente = new EUtenteReg("mario", "rossi", "mariorossi@gmail.com", "password");
print_r($utente->getCarteSalvate());
$data = new DateTime();
$utente->inserisciCarta("mario", "123", "visa", $data, 456,87.50);
print_r($utente->getCarteSalvate());

