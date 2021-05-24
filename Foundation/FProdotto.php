<?php

require_once 'configDB.php';

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

    public static function store(EProdotto $prod) : bool
    {
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
        $query="INSERT INTO Prodotto VALUES(':id',':nome',':des',':tip',':quant',':marca',':prezzo',':nomeImg')";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(':id',$prod->getId());
        $stmt->bindParam(':nome',$prod->getNome());
        $stmt->bindParam(':desc',$prod->getDescrizione());
        $stmt->bindParam(':tip',$prod->getTipologia());
        $stmt->bindParam(':quant',$prod->getQuantita());
        $stmt->bindParam(':marca',$prod->getMarca());
        $stmt->bindParam(':prezzo',$prod->getPrezzo());
        $stmt->bindParam(':nomeImg',$prod->getImmagine()->getNome());
        $ris=$stmt->execute();
        return $ris;
    }

    public static function update(EProdotto $prod) : bool{
        $hostname=$GLOBALS['hostname'];
        $dbname=$GLOBALS['dbname'];
        $user=$GLOBALS['user'];
        $pass=$GLOBALS['pass'];
        $pdo=FConnectionDB::connect($hostname,$dbname,$user,$pass);
    }
}