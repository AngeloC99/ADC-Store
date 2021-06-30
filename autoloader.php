<?php

/**
 * Funzione di autocaricamento per le classi appartenenti ai diversi package.
 * @param $class_name
 */
function myautoload($class_name) {
    switch($class_name[0]) {
        case 'E':
            $class = "Entity/".$class_name.".php";
            include_once ($class);
            break;
        case 'F':
            $class = "Foundation/".$class_name.".php";
            include_once ($class);
            break;
        case 'C':
            $class = "Control/".$class_name.".php";
            include_once ($class);
            break;
        case 'V':
            $class = "View/".$class_name.".php";
            include_once ($class);
            break;
    }
}
function autoload_mailer(){
    include_once 'PHPMailer-master\src\PHPMailer.php';
    include_once 'PHPMailer-master\src\Exception.php';
    include_once 'PHPMailer-master\src\SMTP.php';
}

spl_autoload_register("myautoload");
spl_autoload_register("autoload_mailer");