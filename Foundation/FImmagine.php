<?php


class FImmagine
{
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

    public static function delete(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM Immagine WHERE id=:id");
        $ris=$stmt->execute([':id' => $key]);
        return $ris;
    }

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

    public static function prelevaImmagini() : array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Immagine");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $immagini=array();
        foreach ($rows as $row){
            $imm=new EImmagine($row['nome']);
            $imm->setId($row['id']);
            $imm->setMime($row['mime']);
            $imm->setLarghezza(($row['larghezza']));
            $imm->setAltezza($row['altezza']);
            $imm->setByte($row['byte']);
            $imm->setFormato($row['formato']);
            $imm->setSize($row['size']);
            $key=$row['id'];
            $immagini[$key]=$imm;

        }
        return $immagini;




    }

}