<?php

require_once "Utility.php";


$indi = new EIndirizzo("marconi",34,"ace","Aq",588,false);
$nome = $indi->getNumero();
print($nome);

