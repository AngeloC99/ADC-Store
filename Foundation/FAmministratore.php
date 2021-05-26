<?php


class FAmministratore implements FBase
{
    public static function exist(string $email, string $key2='', string $key3='')  : bool {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM amministratore WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([":email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows)==0){
            return false;
        }
        else{
            return true;
        }

    }

    public static function delete(string $email,string $key2='', string $key3='') : bool{
        $pdo = FConnectionDB::connect();
        $query = "DELETE FROM amministratore WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(["email" => $email]);
        if ($ris==true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function load(string $email,string $key2='', string $key3='') : EAmministratore
    {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM amministratore WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome=$rows[0]['nome'];
        $cognome=$rows[0]['cognome'];
        $email=$rows[0]['email'];
        $password=$rows[0]['password'];

        $admin = new EAmministratore($nome,$cognome,$email,$password);

        return $admin;

    }

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

        if ($ris==true ){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($obj1, $obj2) : bool{
        $pdo = FConnectionDB::connect();

        $query = "UPDATE amministratore SET nome = :nome, cognome = :cognome, email = :email, password = :password  WHERE email = :email2";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":nome" => $obj2->getNome(),
            ":cognome" => $obj2->getCognome(),
            ":email" => $obj2->getEmail(),
            ":password" => $obj2->getPassword(),
            ":email2" => $obj1->getEmail()));

        if ($ris==true){
            return true;
        }
        else{
            return false;
        }
    }


}