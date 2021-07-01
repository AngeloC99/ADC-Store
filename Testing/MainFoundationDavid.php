<?php

require_once "../autoloader.php";
require_once '../configDB.php';

$pm = FPersistentManager::getInstance();

$admin1 = new EUtenteReg('David', 'Di Marco','david.admin@gmail.com','secret');
$admin2 = new EUtenteReg('Angelo', 'Casciani','angelo.admin@gmail.com','secret');
$admin3 = new EUtenteReg('Chiara', 'Romano','chiara.admin@gmail.com','secret');
$admin4 = new EUtenteReg('Serafino', 'Cicerone','serafino.admin@gmail.com','secret');
$pm->store($admin1);
$pm->store($admin2);
$pm->store($admin3);
$pm->store($admin4);