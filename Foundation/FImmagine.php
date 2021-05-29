<?php


class FImmagine
{
    public static function exist($key, $key2, $key3): bool
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

    public static function delete($key, $key2, $key3): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM Immagine WHERE id=:id");
        $ris=$stmt->execute([':id' => $key]);
        return $ris;
    }

    public static function load($key, $key2, $key3) : EImmagine
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Immagine WHERE id=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $f=$rows[0]['formato'];
        $n=$rows[0]['nome'];
        $s=$rows[0]['size'];
        $b=$rows[0]['byte'];
        $l=$rows[0]['larghezza'];
        $a=$rows[0]['altezza'];
        $m=$rows[0]['mime'];
        $imm=new EImmagine($n);
        $imm->setFormato($f);
        $imm->setSize($s);
        $imm->setByte($b);
        $imm->setLarghezza($l);
        $imm->setAltezza($a);
        $imm->setMime($m);
        $imm->setId($key);
        return $imm;
    }

    public static function store($img,$mailutente): bool
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

    public static function update($img1): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt1 = $pdo->prepare("UPDATE Immagine SET nome=$img1->getNome(), formato = $img1->getFormato(), size = $img1->getSize(), byte = $img1->getByte(), larghezza = $img1->getLarghezza(), altezza = $img1->getAltezza(), mime = $img1->Mime() WHERE id=?");
        $ris1 = $stmt1->execute([$img1->getId()]);
        return $ris1;
    }

}