<?php
require_once "autoloader.php";
require_once "configDB.php";
require('StartSmarty.php');


$GLOBALS["path"] = "/~david/ADC-Store/";

$fcontroller = new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);



