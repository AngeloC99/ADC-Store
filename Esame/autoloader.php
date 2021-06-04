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
            $class = "Controller/".$class_name.".php";
            include_once ($class);
            break;
        case 'V':
            $class = "View/".$class_name.".php";
            include_once ($class);
            break;
                
    }
}

spl_autoload_register("myautoload");