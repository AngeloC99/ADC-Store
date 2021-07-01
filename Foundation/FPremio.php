<?php


/**
 * Class FPremio
 * La classe FPremio gestisce la permanenza dei dati per la classe EPremio.
 */
class FPremio
{

    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EPremio nell'apposita
     * tabella del database.
     * @param string $key
     * @return bool
     */
    public static function exist(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=:id");
        $stmt->execute([":id" => $key]);  //se non esiste non va a buon fine la SELECT e viene restituito false, true se invece esiste e quindi la SELECT va a buon fine.
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) == 0){
            return false;
        }
        else{
            return true;
        }

    }

    /**
     * Cancella un'istanza di EPremio sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool
    {
        try {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=:id");
        $stmt->execute(["id" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $idImm=$rows[0]['idImmagine'];
        $pdo->exec('LOCK TABLES Premio, Immagine WRITE');
        $pdo->beginTransaction();
        $ris2=FImmagine::delete($idImm);
        $stmt2=$pdo->prepare("DELETE FROM Premio WHERE id=:id");
        $ris=$stmt2->execute([":id" => $key]);
        $pdo->commit();
        $pdo->exec('UNLOCK TABLES');
        return $ris && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    /**
     * Carica in RAM l'istanza di EPremio che possiede la chiave primaria fornita.
     * @param string $nome
     * @return EPremio
     */
    public static function load(string $id) :EPremio
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=:id");
        $stmt->execute([":id" => $id]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $punti=$rows[0]['punti'];
        $desc=$rows[0]['descrizione'];
        $quant=$rows[0]['quantita'];
        $marca=$rows[0]['marca'];
        $nome=$rows[0]['nome'];
        $idImm=$rows[0]['idImmagine'];
        $imm=FImmagine::load($idImm);
        $premio= new EPremio($nome,$marca,$desc,$quant,$imm,$punti);
        $premio->setId($id);
        return $premio;

    }

    /**
     * Memorizza un'istanza di EPremio sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param EProdotto $obj
     * @param EPremio $obj
     * @return bool
     */
    public static function store(EPremio $obj): bool
    {
        try{
        $pdo=FConnectionDB::connect();
        $pdo->beginTransaction();
        $ris2=FImmagine::store($obj->getImmagine());
        $query="INSERT INTO Premio VALUES(:id,:p,:n,:d,:q,:m,:idImm)";
        $stmt=$pdo->prepare($query);
        $ris=$stmt->execute(array(
            ":id" => $obj->getId(),
            ":p" => $obj->getPrezzoInPunti(),
            ":n" => $obj->getNome(),
            ":d" => $obj->getDescrizione(),
            ":q" => $obj->getQuantita(),
            ":m" => $obj->getMarca(),
            ":idImm" => $obj->getImmagine()->getId()));
        $pdo->commit();
        return $ris && $ris2;

        }
        catch (PDOException $e){
            return $e->getMessage();
            $pdo->rollBack();
        }
    }

    /**
     * Aggiorna i valori di un'istanza di EPremio sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param EPremio $obj
     * @return bool
     */
    public static function update(EPremio $obj): bool //parametro di FBase da discutere
    {
        try{
        $pdo=FConnectionDB::connect();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("UPDATE Premio SET punti = :p, nome = :n, descrizione = :d, quantita = :q, marca = :m, idImmagine = :idImm WHERE id= :id");
        $ris1 = $stmt->execute(array(
            ":p" => $obj->getPrezzoInPunti(),
            ":n" => $obj->getNome(),
            ":d" => $obj->getDescrizione(),
            ":q" => $obj->getQuantita(),
            ":m" => $obj->getMarca(),
            ":idImm" => $obj->getImmagine()->getId(),
            ":id" => $obj->getId()));
        $ris2 = FImmagine::update($obj->getImmagine());
        $pdo->commit();
        return $ris1 && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    /**
     * Recupera tutti i dati contenuti nella tabella Premio, per fornirli ricorsivamente al costruttore di EPremio , per poter restituire poi tutte le istanze corrispondenti.
     * @return array
     */
    public static function prelevaPremi() : array {
        try{
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $immagini=FImmagine::prelevaImmagini();
            $stmt = $pdo->prepare("SELECT * FROM Premio");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $premi = array();
            foreach ($rows as $row) {
                $premio=new EPremio($row['nome'],
                    $row['marca'],
                    $row['descrizione'],
                    $row['quantita'],
                    $immagini[$row['idImmagine']],
                    $row['punti']);
                $premio->setId($row['id']);
                $premi[$row['id']]=$premio;
            }
            $pdo->commit();
            return $premi;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }


    }

}
