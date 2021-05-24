<?php

require_once '../autoloader.php';
class FProdotto implements FBase
{

    public static function exist(string $key)  : bool {
       $pdo=FConnectionDB::connect();
       $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
       $stmt->execute([$key]);
       $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
       if(count($rows)==0){
           return false;
       }
       else{
           return true;
       }

    }

    public static function delete(string $key) : bool{
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

    public static function load(string $nome) : EProdotto
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
        $pdo=FConnectionDB::connect();
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
        $ris2=FImmagine::store($obj->getImmagine());
        if ($ris==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($obj) : bool{
        $pdo=FConnectionDB::connect();
        $stmt0=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
        $stmt0->execute([$obj->getId()]);
        $rows=$stmt0->fetchAll(PDO::FETCH_ASSOC);
        $nomeOldImg=$rows['nomeImmagine'];
        $stmt1 = $pdo->prepare("UPDATE Prodotto SET nome = $obj->getNome(), descrizione = $obj->getDescrizione(), tipologia = $obj->getTipologia(), quantita = $obj->getQuantita, marca = $obj->getMarca(), prezzo = $obj->getPrezzo() WHERE id=?");
        $ris1 = $stmt1->execute([$obj->getId()]);
        $ris2 = FImmagine::update($nomeOldImg);
        if ($ris1==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }
    }
}