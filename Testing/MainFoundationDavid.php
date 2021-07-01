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