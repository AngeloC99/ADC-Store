<?php


/**
 * Class FImmagine
 * La classe FImmagine gestisce la permanenza dei dati per la classe EImmagine.
 */
class FImmagine
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EImmagine nell'apposita
     * tabella del database.
     * @param string $key
     * @return bool
     */
    public static function exist(string $key): bool
    {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM Immagine WHERE id= :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $key]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($rows)==0){
            return false;
        }
        else{
            return true;
        }
    }

    /**
     * Cancella un'istanza di EImmagine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM Immagine WHERE id=:id");
        $ris=$stmt->execute([':id' => $key]);
        return $ris;
    }

    /**
     * Carica in RAM l'istanza di EImmagine che possiede la chiave primaria fornita.
     * @param $key
     * @return EImmagine
     */
    public static function load($key) : EImmagine
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Immagine WHERE id=:id");
        $stmt->execute([':id' => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $f=$rows[0]['formato'];
        $n=$rows[0]['nome'];
        $b=$rows[0]['byte'];
        $imm=new EImmagine($n,$f,$b);
        $imm->setId($key);
        return $imm;
    }

    /**
     * Memorizza un'istanza di EImmagine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param EImmagine $img
     * @return bool
     */
    public static function store(EImmagine $img): bool
    {
        $pdo=FConnectionDB::connect();
        $query="INSERT INTO Immagine VALUES(:id,:n,:b,:f)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":id" => $img->getId(),
            ":n" => $img->getNome(),
            ":b" => $img->getByte(),
            ":f" => $img->getFormato()));
        return $ris;

    }

    /**
     * Aggiorna i valori di un'istanza di EImmagine sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param $img
     * @return bool
     */
    public static function update($img): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE Immagine SET nome=:n, byte = :b,  formato =:f WHERE id= :id");
        $ris = $stmt->execute(array(
            ":n" => $img->getNome(),
            ":b" => $img->getByte(),
            ":f" => $img->getFormato(),
            ":id" => $img->getId()));
        return $ris;
    }

    /**
     * Recupera tutti i dati contenuti nella tabella Immagine, per fornirli ricorsivamente al costruttore di EImmagine , per poter poi restituire tutte le istanze corrispondenti.
     * @return array
     */
    public static function prelevaImmagini() : array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Immagine");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $immagini=array();
        foreach ($rows as $row){
            $imm=new EImmagine($row['nome'],$row['formato'],$row['byte']);
            $imm->setId($row['id']);
            $key=$row['id'];
            $immagini[$key]=$imm;

        }
        return $immagini;




    }

}