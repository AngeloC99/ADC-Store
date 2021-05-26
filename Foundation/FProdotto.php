<?php

require_once '../autoloader.php';
class FProdotto implements FBase
{

    public static function exist(string $key,string $key2='', string $key3='')  : bool {
       $pdo=FConnectionDB::connect();
       $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
       $ris=$stmt->execute([$key]);
       return $ris;

    }

    public static function delete(string $key,string $key2='', string $key3='') : bool{
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $nomeImm=$rows['nomeImmagine'];
        $stmt=$pdo->prepare("DELETE FROM Prodotto WHERE id=?");
        $ris=$stmt->execute([$key]);
        $ris2=FImmagine::delete($nomeImm);
        if ($ris==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function load(string $nome,string $key2='', string $key3='') : EProdotto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE nome=?");
        $stmt->execute([$nome]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $marca=$rows['marca'];
        $desc=$rows['descrizione'];
        $tip=$rows['tipologia'];
        $quant=$rows['quantita'];
        $prezzo=$rows['prezzo'];
        $id=$rows['id'];
        $img=$rows['nomeImmagine'];
        $imm=FImmagine::load($img);
        $prod= new EProdotto($nome,$marca,$desc,$quant,$imm,$prezzo,$tip);
        $prod->setId($id);
        return $prod;

    }

    public static function store($obj) : bool
    {
        //$pdo=FConnectionDB::connect();
        $con = new FConnectionDB();
        $pdo = $con->connect();
        $query="INSERT INTO prodotto VALUES(?,?,?,?,?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array($obj->getId(), $obj->getNome(), $obj->getDescrizione(), $obj->getTipologia(), $obj->getQuantita(), $obj->getMarca(), $obj->getPrezzo(), $obj->getImmagine()->getNome()));
        //$ris=$stmt->execute();
        $ris2=FImmagine::store($obj->getImmagine());
        if ($ris==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($obj1) : bool{
        $pdo=FConnectionDB::connect();
        $stmt1 = $pdo->prepare("UPDATE Prodotto SET nome = $obj1->getNome(), descrizione = $obj1->getDescrizione(), tipologia = $obj1->getTipologia(), quantita = $obj1->getQuantita, marca = $obj1->getMarca(), prezzo = $obj1->getPrezzo() WHERE id=?");
        $ris1 = $stmt1->execute([$obj1->getId()]);
        $ris2 = FImmagine::update($obj1->getImmagine());
        if ($ris1==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }
    }
}