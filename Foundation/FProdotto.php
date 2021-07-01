<?php

/**
 * Class FProdotto
 *  La classe FProdotto gestisce la permanenza dei dati per la classe EProdotto.
 * @package Foundation
 */
class FProdotto
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EProdotto nell'apposita
     * tabella del database.
     * @param $key
     * @return bool
     */
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

    /**
     * Cancella un'istanza di EProdotto sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $key
     * @return bool
     */
    public static function delete($key) : bool {
        try{
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=:id");
        $stmt->execute([":id" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $idImm=$rows[0]['idImmagine'];
        $pdo->exec('LOCK TABLES Prodotto WRITE, Immagine WRITE');
        $pdo->beginTransaction();
        $stmt=$pdo->prepare("DELETE FROM Prodotto WHERE id=:id");
        $ris=$stmt->execute([":id" => $key]);
        $ris2=FImmagine::delete($idImm);
        $pdo->commit();
        $pdo->exec('UNLOCK TABLES');
        return $ris && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Carica in RAM l'istanza di EProdotto che possiede la chiave primaria fornita.
     * @param $key1
     * @return EProdotto
     */
    public static function load($key1) : EProdotto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Prodotto WHERE id=:id");
        $stmt->execute([':id'=>$key1]);
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

    /**
     * Memorizza un'istanza di EProdotto sul database e restituisce un booleano che indica l'esito dell'operazione.     * @param EProdotto $obj
     * @return bool
     */
    public static function store(EProdotto $obj) : bool
    {
        try{
        $pdo=FConnectionDB::connect();
        $pdo->beginTransaction();
        if (!FImmagine::exist($obj->getImmagine()->getId())) {
            FImmagine::store($obj->getImmagine());
        }
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
        $pdo->commit();
        return $ris;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Aggiorna i valori di un'istanza di EProdotto sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param $obj1
     * @return bool
     */
    public static function update($obj1) : bool{
        try{
        $pdo=FConnectionDB::connect();
        $pdo->exec('LOCK TABLES Prodotto WRITE, Immagine WRITE');
        $pdo->beginTransaction();
        $stmt1 = $pdo->prepare("UPDATE Prodotto SET nome = :nome, descrizione = :des, tipologia = :tip, quantita = :quant, marca = :marca, prezzo = :prezzo WHERE id=:id");
        $ris1 = $stmt1->execute([':nome'=>$obj1->getNome(), ':des'=>$obj1->getDescrizione(),':tip'=>$obj1->getTipologia(),':quant'=>$obj1->getQuantita(),':marca'=>$obj1->getMarca(),':prezzo'=>$obj1->getPrezzo(),':id'=>$obj1->getId()]);
        $ris2 = FImmagine::update($obj1->getImmagine());
        $pdo->commit();
        $pdo->exec('UNLOCK TABLES');
        return $ris1 && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }

    }

    /**
     * Recupera tutti i dati contenuti nella tabella Prodotto, per fornirli ricorsivamente al costruttore di EProdotto , per poter restituire tutte le istanze corrispondenti.
     * @return array
     */
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
                $prod->setId($row['id']);
                $prodotti[$row['id']]=$prod;
        }
            $pdo->commit();
            return $prodotti;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }


    }

    /**
     * Recupera tutti i dati (filtrati mediante la tipologia) contenuti nella tabella Prodotto, per fornirli ricorsivamente al costruttore di EProdotto , per poter poi restituire tutte le istanze corrispondenti alla ricerca effettuata.
     * @param string $tip
     * @return array
     */
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
                $prod->setId($row['id']);
                $prodotti[$row['id']]=$prod;
            }
            $pdo->commit();
            return $prodotti;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    /**
     * Recupera tutti i dati (filtrati mediante il nome) contenuti nella tabella Prodotto, per fornirli ricorsivamente al costruttore di EProdotto , per poter poi restituire tutte le istanze corrispondenti alla ricerca effettuata.
     * @param string $nome
     * @return array
     */
    public static function prelevaPerNome(string $nome) : array {
        try{
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $immagini=FImmagine::prelevaImmagini();
            $stmt = $pdo->prepare("SELECT * FROM Prodotto WHERE nome = :nome");
            $stmt->execute([":nome"=>$nome]);
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
                $prod->setId($row['id']);
                $prodotti[$row['id']]=$prod;
            }
            $pdo->commit();
            return $prodotti;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

}