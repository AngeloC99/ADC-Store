<?php


class VRicerca
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct (){
        $this->smarty = configSmarty::configuration();
    }

}