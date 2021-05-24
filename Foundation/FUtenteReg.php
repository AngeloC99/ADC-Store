<?php


class FUtenteReg implements FBase
{
    public static function exist(string $email)  : bool {
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query = "SELECT * FROM UtenteReg WHERE email=?";
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
        $query = "DELETE FROM UtenteReg WHERE email=?";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute([$email]);
        if ($ris==true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function load(string $email) : EUtenteReg
    {
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query = "SELECT * FROM UtenteReg WHERE email=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome=$rows[0]['nome'];
        $cognome=$rows[0]['cognome'];
        $email=$rows[0]['email'];
        $password=$rows[0]['password'];
        $punti = $rows[0]['punti'];

        $user = new EUtenteReg($nome,$cognome,$email,$password);
        $user->setPunti($punti);

        return $user;

    }

    public static function store($obj) : bool
    {
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query="INSERT INTO UtenteReg VALUES(?,?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array($obj->getEmail(), $obj->getNome(), $obj->getCognome(), $obj->getPassword(), $obj->getPunti()));

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

        $query = "UPDATE UtenteReg SET nome = ?, cognome = ?, email = ?, password = ?, punti = ?  WHERE email = ?";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array($obj2->getNome(),$obj2->getCognome(), $obj2->getEmail(),$obj2->getPassword(), $obj2->getPunti(), $obj1->getEmail()));

        if ($ris==true){
            return true;
        }
        else{
            return false;
        }
    }

}