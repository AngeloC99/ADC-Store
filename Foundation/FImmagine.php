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
        $s=$rows[0]['size'];
        $b=$rows[0]['byte'];
        $l=$rows[0]['larghezza'];
        $a=$rows[0]['altezza'];
        $m=$rows[0]['mime'];
        $imm=new EImmagine($n,$f,$s,$b,$l,$a,$m);
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
        $query="INSERT INTO Immagine VALUES(:id,:n,:f,:s,:b,:l,:a,:m)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":id" => $img->getId(),
            ":n" => $img->getNome(),
            ":f" => $img->getFormato(),
            ":s" => $img->getSize(),
            ":b" => $img->getByte(),
            ":l" => $img->getLarghezza(),
            ":a" => $img->getAltezza(),
            ":m" => $img->getMime()));
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
        $stmt = $pdo->prepare("UPDATE Immagine SET nome=:n, formato =:f, size = :s, byte = :b, larghezza = :l, altezza = :a, mime = :m WHERE id= :id");
        $ris = $stmt->execute(array(
            ":n" => $img->getNome(),
            ":f" => $img->getFormato(),
            ":s" => $img->getSize(),
            ":b" => $img->getByte(),
            ":l" => $img->getLarghezza(),
            ":a" => $img->getAltezza(),
            ":m" => $img->getMime(),
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
            $imm=new EImmagine($row['nome'],$row['formato'],$row['size'],$row['byte'],$row['larghezza'],$row['altezza'],$row['mime']);
            $imm->setId($row['id']);
            $key=$row['id'];
            $immagini[$key]=$imm;

        }
        return $immagini;




    }

}