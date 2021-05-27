<?php

require_once '../autoloader.php';
class FProdotto implements FBase
{

    public static function exist($key, $key2, $key3)  : bool {
       $pdo=FConnectionDB::connect();
       $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
       $stmt->execute([$key]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows)==0){
            return false;
        }
        else{
            return true;
        }

    }

    public static function delete($key, $key2, $key3) : bool{
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $nomeImm=$rows['nomeImmagine'];
        $stmt=$pdo->prepare("DELETE FROM Prodotto WHERE id=?");
        $ris=$stmt->execute([$key]);
        $ris2=FImmagine::delete($nomeImm);
        return $ris && $ris2;

    }

    public static function load($key1, $key2, $key3) : EProdotto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=?");
        $stmt->execute([$key1]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $marca=$rows[0]['marca'];
        $desc=$rows[0]['descrizione'];
        $tip=$rows[0]['tipologia'];
        $quant=$rows[0]['quantita'];
        $prezzo=$rows[0]['prezzo'];
        $nome=$rows[0]['nome'];
        $idImm=$rows[0]['idImmagine'];
        $imm=FImmagine::load($idImm,$key2,$key3);
        $prod= new EProdotto($nome,$marca,$desc,$quant,$imm,$prezzo,$tip);
        $prod->setId($key1);
        return $prod;

    }

    public static function store($obj,$mailutente) : bool
    {
        $pdo=FConnectionDB::connect();
        $ris2=FImmagine::store($obj->getImmagine(),$mailutente);
        $query="INSERT INTO Prodotto VALUES(:id,:n,:d,:t,:q,:m,:p,:idImm)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":id"=>$obj->getId(),
            ":n"=>$obj->getNome(),
            ":d"=>$obj->getDescrizione(),
            ":t"=>$obj->getTipologia(),
            ":q"=>$obj->getQuantita(),
            ":m"=>$obj->getMarca(),
            ":p"=>$obj->getPrezzo(),
            ":idImm" => $obj->getImmagine()->getId()));
        return $ris && $ris2;
    }

    public static function update($obj1) : bool{
        $pdo=FConnectionDB::connect();
        $stmt1 = $pdo->prepare("UPDATE Prodotto SET nome = $obj1->getNome(), descrizione = $obj1->getDescrizione(), tipologia = $obj1->getTipologia(), quantita = $obj1->getQuantita, marca = $obj1->getMarca(), prezzo = $obj1->getPrezzo() WHERE id=?");
        $ris1 = $stmt1->execute([$obj1->getId()]);
        $ris2 = FImmagine::update($obj1->getImmagine());
        return $ris1 && $ris2;
    }
}