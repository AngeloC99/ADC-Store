<?php

class FProdotto
{

    public static function exist($key)  : bool {
       $pdo=FConnectionDB::connect();
       $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=:id");
       $stmt->execute([":id" => $key]);
       $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows)==0){
            return false;
        }
        else{
            return true;
        }

    }

    public static function delete($key) : bool{
        try{
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=:id");
        $stmt->execute([":id" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $idImm=$rows[0]['idImmagine'];
        $pdo->beginTransaction();
        $stmt=$pdo->prepare("DELETE FROM Prodotto WHERE id=:id");
        $ris=$stmt->execute([":id" => $key]);
        $ris2=FImmagine::delete($idImm);
        return $ris && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }

    }

    public static function load($key1) : EProdotto
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
        $imm=FImmagine::load($idImm);
        $prod= new EProdotto($nome,$marca,$desc,$quant,$imm,$prezzo,$tip);
        $prod->setId($key1);
        return $prod;

    }

    public static function store(EProdotto $obj) : bool
    {
        try{
        $pdo=FConnectionDB::connect();
        $pdo->beginTransaction();
        $ris2=FImmagine::store($obj->getImmagine());
        $query="INSERT INTO Prodotto VALUES(:id,:n,:d,:t,:q,:m,:p,:idImm)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute([
            ":id"=>$obj->getId(),
            ":n"=>$obj->getNome(),
            ":d"=>$obj->getDescrizione(),
            ":t"=>$obj->getTipologia(),
            ":q"=>$obj->getQuantita(),
            ":m"=>$obj->getMarca(),
            ":p"=>$obj->getPrezzo(),
            ":idImm" => $obj->getImmagine()->getId()]);
        return $ris && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    public static function update($obj1) : bool{
        try{
        $pdo=FConnectionDB::connect();
        $pdo->beginTransaction();
        $stmt1 = $pdo->prepare("UPDATE Prodotto SET nome = :nome, descrizione = :des, tipologia = :tip, quantita = :quant, marca = :marca, prezzo = :prezzo WHERE id=:id");
        $ris1 = $stmt1->execute([':nome'=>$obj1->getNome(), ':des'=>$obj1->getDescrizione(),':tip'=>$obj1->getTipologia(),':quant'=>$obj1->getQuantita(),':marca'=>$obj1->getMarca(),':prezzo'=>$obj1->getPrezzo(),':id'=>$obj1->getId()]);
        $ris2 = FImmagine::update($obj1->getImmagine());
        return $ris1 && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }

    }

    public static function prelevaProdotti() : array {
        try{
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $immagini=FImmagine::prelevaImmagini();
            $stmt = $pdo->prepare("SELECT * FROM Prodotto");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $prodotti = array();
            foreach ($rows as $row) {
                $prod=new EProdotto($row['nome'],
                    $row['marca'],
                    $row['descrizione'],
                    $row['quantita'],
                    $immagini[$row['idImmagine']],
                    $row['prezzo'],
                    $row['tipologia']);
                $prodotti[]=$prod;
        }
            return $prodotti;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }


    }
    public static function prelevaPerTipologia(string $tip) : array {
        try{
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $immagini=FImmagine::prelevaImmagini();
            $stmt = $pdo->prepare("SELECT * FROM Prodotto WHERE tipologia = :tip");
            $stmt->execute([":tip"=>$tip]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $prodotti = array();
            foreach ($rows as $row) {
                $prod=new EProdotto($row['nome'],
                    $row['marca'],
                    $row['descrizione'],
                    $row['quantita'],
                    $immagini[$row['idImmagine']],
                    $row['prezzo'],
                    $row['tipologia']);
                $prodotti[]=$prod;
            }
            return $prodotti;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }



}