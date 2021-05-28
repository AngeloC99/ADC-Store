<?php


class FPersistentManager
{
    public function __construct()
    {
    }

    /**
     * Metodo che permette di salvare un oggetto sul database.
     */
    public function store(object $obj,$mailutente=null) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::store($obj,$mailutente);
        return $ris;
    }

    /**
     * Metodo che permette di aggiornare un oggetto nel database.
     */
    public function update(object $obj) : bool {
        $Eclass = get_class($obj);
        $Fclass = str_replace("E", "F", $Eclass);
        $ris=$Fclass::update($obj);
        return $ris;
    }

    public function load(string $Fclass,$key1,$key2=null,$key3=null) : object{
        $object=$Fclass::load($key1,$key2,$key3);
        return $object;
    }

    public function exist(string $Fclass,$key1,$key2=null,$key3=null) : bool {
        $ris = $Fclass::exist($key1,$key2,$key3);
        return $ris;
    }


    public function delete(string $Fclass,$key1,$key2=null,$key3=null) : bool {
        $ris = $Fclass::delete($key1,$key2,$key3);
        return $ris;
    }

    public function prelevaUtenti() : array {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg";
        $stmt=$pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $utenti = array();
        foreach ($rows as $row) {
            $user = new EUtenteReg(
                $row['nome'],
                $row['cognome'],
                $row['email'],
                $row['password']);
            $utenti[] = $user;
        }
        return $utenti;
    }
}



