<?php


class FPersistentManager
{
    public function __construct()
    {
    }

    /** Metodo che permette di salvare un oggetto sul db
 */
    public static function store(object $obj,$mailutente=null) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::store($obj,$mailutente);
        return $ris;
    }

    /** Metodo che permette di aggiornare un oggetto nel db
     */
    public static function update(object $obj) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::update($obj);
        return $ris;
    }

    public static function load(string $Fclass,$key1,$key2=null,$key3=null) : object{
        $object=$Fclass::load($key1,$key2,$key3);
        return $object;
    }

    public static function exist(string $Fclass,$key1,$key2=null,$key3=null) : bool {
        $ris = $Fclass::exist($key1,$key2,$key3);
        return $ris;
    }


    public static function delete(string $Fclass,$key1,$key2=null,$key3=null) : bool {
        $ris = $Fclass::delete($key1,$key2,$key3);
        return $ris;
    }
}



