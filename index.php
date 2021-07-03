<?php
require_once "autoloader.php";
require_once "configDB.php";
require('StartSmarty.php');


$GLOBALS["path"] = "/~".get_current_user()."/ADC-Store/";

$fcontroller = new CFrontController();
$fcontroller->run($_SERVER['REQUEST_URI']);



