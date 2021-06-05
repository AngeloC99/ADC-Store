<?php


class CVisualizzareBuoni
{
    public static function recuperaBuoni(){
        $pm=new FPersistentManager();
        return $pm->prelevaBuoni();
    }

}