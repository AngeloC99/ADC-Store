<?php

require_once 'configDB.php';
require_once 'Entity/Utility.php';

class FProdotto implements FBase
{

    public static function exist(string $key)  : bool {
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
       $ris=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
       $ris->execute([$key]);
       $rows=$ris->fetchAll(PDO::FETCH_ASSOC);
       if(count($rows)==0){
           return false;
       }
       else{
           return true;
       }

    }

    public static function delete(string $key) : bool
    {
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
        $ris=$pdo->prepare("DELETE FROM Prodotto WHERE id=?");
        $ris->execute([$key]);
        return $ris;

    }

    public static function load(string $nome) : EProdotto
    {
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
        $ris=$pdo->prepare("SELECT * FROM Prodotto WHERE nome=?");
        $ris->execute([$nome]);
        $rows=$ris->fetchAll(PDO::FETCH_ASSOC);
        $marca=$rows['marca'];
        $desc=$rows['descrizione'];
        $tip=$rows['tipologia'];
        $quant=$rows['quantita'];
        $prezzo=$rows['prezzo'];
        $id=$rows['id'];
        $img=$rows['nomeImmagine'];
        $ris2=$pdo->prepare("SELECT * FROM Immagine WHERE nome=?");
        $ris2->execute([$img]);
        $rows2=$ris2->fetchAll(PDO::FETCH_ASSOC);
        $imm=new EImmagine($img);
        $imm->setFormato=$rows2['formato'];
        $imm->setSize=$rows2['size'];
        $imm->setByte=$rows2['byte'];
        $imm->setFormato=$rows2['formato'];
        $imm->setLarghezza=$rows2['larghezza'];
        $imm->setAltezza=$rows2['altezza'];
        $imm->setMime=$rows2['mime'];
        $prod= new EProdotto($nome,$marca,$desc,$quant,$imm,$prezzo,$tip);
        $prod->setId($id);
        return $prod;

    }

    public static function store($obj) : bool
    {
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
        $query="INSERT INTO Prodotto VALUES(':id',':nome',':des',':tip',':quant',':marca',':prezzo',':nomeImg')";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(':id',$obj->getId());
        $stmt->bindParam(':nome',$obj->getNome());
        $stmt->bindParam(':desc',$obj->getDescrizione());
        $stmt->bindParam(':tip',$obj->getTipologia());
        $stmt->bindParam(':quant',$obj->getQuantita());
        $stmt->bindParam(':marca',$obj->getMarca());
        $stmt->bindParam(':prezzo',$obj->getPrezzo());
        $stmt->bindParam(':nomeImg',$obj->getImmagine()->getNome());
        $ris=$stmt->execute();
        return $ris;
    }

    public static function update($obj) : bool{
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
        $stmt = $pdo->prepare("UPDATE Prodotto SET nome = $obj->getNome(), descrizione = $obj->getDescrizione(), tipologia = $obj->getTipologia(), quantita = $obj->getQuantita, marca = $obj->getMarca(), prezzo = $obj->getPrezzo() WHERE id=?");
        $ris = $stmt->execute([$obj->getId()]);
        return $ris;

    }
}