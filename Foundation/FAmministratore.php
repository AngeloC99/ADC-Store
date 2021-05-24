<?php


class FAmministratore implements FBase
{
    public static function exist(string $email)  : bool {
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query = "SELECT * FROM amministratore WHERE email=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows)==0){
            return false;
        }
        else{
            return true;
        }

    }

    public static function delete(string $email) : bool{
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query = "DELETE FROM amministratore WHERE email=?";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute([$email]);
        if ($ris==true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function load(string $email) : EAmministratore
    {
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query = "SELECT * FROM amministratore WHERE email=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
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
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query="INSERT INTO amministratore VALUES(?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array($obj->getEmail(), $obj->getNome(), $obj->getCognome(), $obj->getPassword()));

        if ($ris==true ){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($obj1, $obj2) : bool{
        $con = new FConnectionDB();
        $pdo = $con->connect();

        $query = "UPDATE amministratore SET nome = ?, cognome = ?, email = ?, password = ?  WHERE email = ?";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array($obj2->getNome(),$obj2->getCognome(), $obj2->getEmail(),$obj2->getPassword(), $obj1->getEmail()));

        if ($ris==true){
            return true;
        }
        else{
            return false;
        }
    }

}