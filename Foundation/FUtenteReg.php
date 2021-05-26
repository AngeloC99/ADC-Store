<?php


class FUtenteReg implements FBase
{
    public static function exist(string $email,string $key2='', string $key3='')  : bool {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg WHERE email= :email";
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
        $query = "DELETE FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute([":email" => $email]);
        if ($ris==true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function load(string $email,string $key2='', string $key3='') : EUtenteReg
    {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["email" => $email]);
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
        $pdo = FConnectionDB::connect();
        $query="INSERT INTO UtenteReg VALUES(:email,:nome,:cognome,:password,:punti)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":email" => $obj->getEmail(),
            "nome" => $obj->getNome(),
            "cognome" => $obj->getCognome(),
            "password" => $obj->getPassword(),
            ":punti" => $obj->getPunti()));

        if ($ris==true ){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($obj1, $obj2=null) : bool{
        $pdo = FConnectionDB::connect();
        $query = "UPDATE UtenteReg SET nome = :nome, cognome = :cognome, email = :email, password = :password, punti = :punti  WHERE email = :email2";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":nome" => $obj2->getNome(),
            ":cognome" => $obj2->getCognome(),
            ":email" => $obj2->getEmail(),
            ":password" => $obj2->getPassword(),
            ":punti" => $obj2->getPunti(),
            ":email2" => $obj1->getEmail()));

        if ($ris==true){
            return true;
        }
        else{
            return false;
        }
    }

    public static function prelevaUtenti() : array {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg";
        $stmt=$pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $utenti = array();
        foreach ($rows as $row) {
            $user = new EUtenteReg($row['nome'],
                $row['cognome'],
                $row['email'],
                $row['password']);
                $utenti[] = $user;
        }
        return $utenti;

    }

}