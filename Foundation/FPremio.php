<?php


class FPremio
{
    public static function exist($key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=:id");
        $ris=$stmt->execute([":id" => $key]);  //se non esiste non va a buon fine la SELECT e viene restituito false, true se invece esiste e quindi la SELECT va a buon fine.
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        FConnectionDB::closeConnection();

        if (count($rows) == 0){
            return false;
        }
        else{
            return true;
        }


    }

    public static function delete($key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=:id");
        $stmt->execute(["id" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $nomeImm=$rows['nomeImmagine'];
        $stmt=$pdo->prepare("DELETE FROM Premio WHERE id=:id");
        $ris=$stmt->execute([":id" => $key]);

        FConnectionDB::closeConnection();
        $ris2=FImmagine::delete($nomeImm);
        return $ris && $ris2;
    }

    public static function load($nome) :EPremio
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE nome=:nome");
        $stmt->execute([":nome" => $nome]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

        FConnectionDB::closeConnection();
        $punti=$rows['punti'];
        $desc=$rows['descrizione'];
        $quant=$rows['quantita'];
        $marca=$rows['marca'];
        $id=$rows['id'];
        $img=$rows['nomeImmagine'];
        $imm=FImmagine::load($img);
        $premio= new EPremio($nome,$marca,$desc,$quant,$imm,$punti);
        $premio->setId($id);
        return $premio;
    }

    public static function store($obj): bool
    {
        $pdo=FConnectionDB::connect();
        $query="INSERT INTO Premio VALUES(:id,:p,:n,:d,:q,:m,:nimm)";
        $stmt=$pdo->prepare($query);
        $ris=$stmt->execute(array(
            ":id" => $obj->getId(),
            ":p" => $obj->getPrezzoInPunti(),
            ":n" => $obj->getNome(),
            ":d" => $obj->getDescrizione(),
            ":q" => $obj->getQuantita(),
            ":m" => $obj->getMarca(),
            ":nimm" => $obj->getImmagine()->getNome()));

        FConnectionDB::closeConnection();
        $ris2=FImmagine::store($obj->getImmagine());
        return $ris && $ris2;

    }

    public static function update($obj): bool //parametro di FBase da discutere
    {
        $pdo=FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE Premio SET punti = :p, nome = :n, descrizione = :d, quantita = :q, marca = :m, nomeImmagine = :nimm WHERE id= :id");
        $ris1 = $stmt->execute(array(
            ":p" => $obj->getPrezzoInPunti(),
            ":n" => $obj->getNome(),
            ":d" => $obj->getDescrizione(),
            ":q" => $obj->getQuantita(),
            ":m" => $obj->getMarca(),
            ":nimm" => $obj->getImmagine()->getNome(),
            ":id" => $obj->getId()));

        FConnectionDB::closeConnection();
        $ris2 = FImmagine::update($obj->getImmagine());
        return $ris1 && $ris2;
    }
}
