<?php


/**
 * La classe FAmministrtatore garantisce la permanenza dei dati per la classe EAmministratore.
 * Class FCarrello
 * @package Foundation
 */
class FAmministratore
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EAmministratore nell'apposita
     * tabella del database
     * @param string $email
     * @return bool
     */
    public static function exist(string $email)  : bool {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM amministratore WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([":email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        FConnectionDB::closeConnection();

        if(count($rows)==0){
            return false;
        }
        else{
            return true;
        }

    }

    /**
     * Cancella un'istanza di EAmministratore sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $email
     * @return bool
     */
    public static function delete(string $email) : bool{
        $pdo = FConnectionDB::connect();
        $query = "DELETE FROM amministratore WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(["email" => $email]);

        FConnectionDB::closeConnection();
        return $ris;

    }

    /**
     * Carica in RAM l'istanza di EAmministratore che possiede la chiave primaria fornita.
     * @param string $email
     * @return EAmministratore
     */
    public static function load(string $email) : EAmministratore
    {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM amministratore WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        FConnectionDB::closeConnection();
        $nome=$rows[0]['nome'];
        $cognome=$rows[0]['cognome'];
        $email=$rows[0]['email'];
        $password=$rows[0]['password'];

        $admin = new EAmministratore($nome,$cognome,$email,$password);

        return $admin;

    }

    /**
     * Memorizza un'istanza di EAmministratore sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $obj
     * @return bool
     */
    public static function store($obj) : bool
    {
        $pdo = FConnectionDB::connect();
        $query="INSERT INTO amministratore VALUES(:email,:nome,:cognome,:password)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":email" => $obj->getEmail(),
            "nome" => $obj->getNome(),
            "cognome" => $obj->getCognome(),
            "password" => $obj->getPassword()));

        FConnectionDB::closeConnection();

        return $ris;
    }

    /**
     * Aggiorna i valori di un'istanza di EAmministratore sul database e restituisce un booleano che indica l'esito
     * @param $obj
     * @return bool
     */
    public static function update($obj) : bool{
        $pdo = FConnectionDB::connect();
        $query = "UPDATE amministratore SET nome = :nome, cognome = :cognome, password = :password  WHERE email = :email";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":nome" => $obj->getNome(),
            ":cognome" => $obj->getCognome(),
            ":password" => $obj->getPassword(),
            ":email" => $obj->getEmail()));

        FConnectionDB::closeConnection();
        return $ris;


    }


}