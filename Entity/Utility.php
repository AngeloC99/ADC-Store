<?php
/* Funzione di autocaricamento per le classi. */
function myautoload($class_name){

    $class = __DIR__ . "/" . $class_name . ".php";

    if(file_exists($class)){
        include $class;
    }

    else{
        return false;
    }

    return true;
}

spl_autoload_register("myautoload");