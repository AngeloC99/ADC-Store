<?php


class FImmagine implements FBase
{
    public static function exist(string $key,string $key2='', string $key3=''): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Immagine WHERE nome=?");
        $ris=$stmt->execute([$key]);
        return $ris;

    }

    public static function delete(string $key,string $key2='', string $key3=''): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM Immagine WHERE nome=?");
        $ris=$stmt->execute([$key]);
        return $ris;
    }

    public static function load(string $nome,string $key2='', string $key3='') : EImmagine
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE nome=?");
        $stmt->execute([$nome]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $f=$rows['formato'];
        $s=$rows['size'];
        $b=$rows['byte'];
        $l=$rows['larghezza'];
        $a=$rows['altezza'];
        $m=$rows['mime'];
        $imm=new EImmagine($nome,$f,$s,$b,$l,$a,$m);
        return $imm;
    }

    public static function store($img): bool
    {
        $pdo=FConnectionDB::connect();
        $query="INSERT INTO Immagine VALUES(?,?,?,?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $ris=$stmt->execute([$img->getNome(),$img->getFormato(),$img->getSize(),$img->getByte(),$img->getLarghezza(),$img->getAltezza(),$img->getMime()]);
        return $ris;

    }

    public static function update($img1): bool //parametro di FBase da discutere
    {
        $pdo=FConnectionDB::connect();
        $stmt1 = $pdo->prepare("UPDATE Immagine SET formato = $img1->getFormato(), size = $img1->getSize(), byte = $img1->getByte(), larghezza = $img1->getLarghezza(), altezza = $img1->getAltezza(), mime = $img1->Mime() WHERE nome=?");
        $ris1 = $stmt1->execute([$img1->getNome()]);
        return $ris1;
    }

}