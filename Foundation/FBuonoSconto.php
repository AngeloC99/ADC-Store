<?php


class FBuonoSconto implements FBase
{
    public static function exist($key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=:cod");
        $ris=$stmt->execute([":cod" => $key]);
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
        $stmt=$pdo->prepare("DELETE FROM BuonoSconto WHERE codice=:cod");
        $ris=$stmt->execute([":cod" => $key]);

        FConnectionDB::closeConnection();
        return $ris;
    }

    public static function load($key) : EBuonoSconto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=:cod");
        $stmt->execute([":cod" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

        FConnectionDB::closeConnection();
        $a=$rows['ammontare'];
        $s=$rows['scadenza'];
        $p=$rows['percentuale'];
        $bs=new EBuonoSconto($p,$a);
        $bs->setScadenza($s);
        return $bs;
    }

    public static function store($bs, $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO BuonoSconto VALUES(:cod, :amm, :perc, :scad, :mailutente)";
        $stmt = $pdo->prepare($query);
        $ris=$stmt->execute(array(
            ":cod" => $bs->getCodice(),
            ":amm" => $bs->getAmmontare(),
            ":perc" => $bs->isPercentuale(),
            ":scad" => $bs->getScadenza(),
            ":mailutente" => $mailutente));

        FConnectionDB::closeConnection();
        return $ris;
    }

    public static function update($bs1): bool
    {
        return false; //il buono non puo' essere aggiornato in alcun modo.
    }

}