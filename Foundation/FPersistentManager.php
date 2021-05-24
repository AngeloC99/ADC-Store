<?php


class FPersistentManager
{
/** Metodo che permette di salvare un oggetto sul db
 */
    public static function store(object $obj) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::store($obj);
        return $ris;
    }

    /** Metodo che permette di aggiornare un oggetto nel db
     */
    public static function update(object $obj1, object $obj2) : bool {
        $Eclass = get_class($obj1);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::update($obj1, $obj2);
        return $ris;
    }

    public static function load(string $key,string $Fclass) : object{
        $object=$Fclass::load($key);
        return $object;
    }

    public static function exist(string $key,string $Fclass) : bool {
        $ris = $Fclass::exist($key);
        return $ris;
    }


    public static function delete(string $key,string $Fclass) : bool {
        $ris = $Fclass::delete($key);
        return $ris;
    }
}



