<?php


class FBuonoSconto implements FBase
{
    public static function exist(string $key,string $key2='', string $key3=''): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=?");
        $ris=$stmt->execute([$key]);
        return $ris;

    }

    public static function delete(string $key,string $key2='', string $key3=''): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM BuonoSconto WHERE codice=?");
        $ris=$stmt->execute([$key]);
        return $ris;
    }

    public static function load(string $key,string $key2='', string $key3='') : EBuonoSconto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $a=$rows['ammontare'];
        $s=$rows['scadenza'];
        //$e=$rows['mailutente'];  //l'email serve per recuperare un buono ????????? perchè per istanziarlo non serve
        $p=$rows['percentuale']; //nuovo campo nella tabella BuonoSconto
        $bs=new EBuonoSconto($p,$a);
        $bs->setScadenza($s);
        return $bs;
    }

    public static function store($bs): bool
    {
        $pdo=FConnectionDB::connect();
        $query="INSERT INTO BuonoSconto VALUES(?,?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $ris=$stmt->execute([$bs->getCodice(),$bs->getAmmontare(),$bs->isPercentuale(),$bs->getScadenza(),$EMAIL??????]);
        return $ris;

    }

    public static function update($bs1): bool //parametro di FBase da discutere
    {
        $pdo=FConnectionDB::connect();
        $stmt1 = $pdo->prepare("UPDATE BuonoSconto SET ammontare = $bs1->getAmmontare(), percentuale = $bs1->isPercentuale(), scadenza = $bs1->getScadenza(), mailutente = ?????? WHERE codice=?");
        $ris1 = $stmt1->execute([$bs1->getCodice()]);
        return $ris1;
    }

}