<?php

require_once '../autoloader.php';
class FPremio implements FBase
{
    public static function exist(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt=$pdo->prepare("DELETE FROM Premio WHERE id=?");
        $ris=$stmt->execute([$key]);
        return $ris;
    }

    public static function load(string $nome) :EPremio
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE nome=?");
        $stmt->execute([$nome]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $punti=$rows['punti'];
        $desc=$rows['descrizione'];
        $quant=$rows['quantita'];
        $marca=$rows['marca'];
        $id=$rows['id'];
        $img=$rows['nomeImmagine'];
        $stmt2=$pdo->prepare("SELECT * FROM Immagine WHERE nome=?");
        $stmt2->execute([$img]);
        $rows2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
        $imm=new EImmagine($img);
        $imm->setFormato($rows2['formato']);
        $imm->setSize($rows2['size']);
        $imm->setByte($rows2['byte']);
        $imm->setFormato($rows2['formato']);
        $imm->setLarghezza($rows2['larghezza']);
        $imm->setAltezza($rows2['altezza']);
        $imm->setMime($rows2['mime']);
        $premio= new EPremio($nome,$marca,$desc,$quant,$imm,$punti);
        $premio->setId($id);
        return $premio;
    }

    public static function store($obj): bool
    {
        $pdo=FConnectionDB::connect();
        $query="INSERT INTO Premio VALUES(':id',':punti',':nome',':desc',':quant',':marca',':nomeImg')";
        $stmt=$pdo->prepare($query);
        $stmt->bindParam(':id',$obj->getId());
        $stmt->bindParam(':nome',$obj->getNome());
        $stmt->bindParam(':desc',$obj->getDescrizione());
        $stmt->bindParam(':quant',$obj->getQuantita());
        $stmt->bindParam(':marca',$obj->getMarca());
        $stmt->bindParam(':punti',$obj->getPrezzoInPunti());
        $stmt->bindParam(':nomeImg',$obj->getImmagine()->getNome());
        $ris=$stmt->execute();
        //Conseguente store dell'immagine:
        $imm=$obj->getImmagine();
        $query2="INSERT INTO Immagine VALUES(':nome',':formato',':size',':byte',':larghezza',':altezza',':mime')";
        $stmt2=$pdo->prepare($query2);
        $ris2=$stmt2->execute([$imm->getNome(),$imm->getFormato(),$imm->getSize(),$imm->getByte(),$imm->getLarghezza(),$imm->getAltezza(),$imm->getMime()]);

        if ($ris1=true & $ris2=true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function update($obj): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt0=$pdo->prepare("SELECT * FROM Premio WHERE id=?");
        $stmt0->execute([$obj->getId()]);
        $rows=$stmt0->fetchAll(PDO::FETCH_ASSOC);
        $nomeOldImg=$rows['nomeImmagine'];
        $stmt1 = $pdo->prepare("UPDATE Premio SET punti = $obj->getPrezzoInPunti(), nome = $obj->getNome(), descrizione = $obj->getDescrizione(), quantita = $obj->getQuantita, marca = $obj->getMarca(), nomeImmagine = $obj->getImmagine()->getNome() WHERE id=?");
        $ris1 = $stmt1->execute([$obj->getId()]);
        //conseguente update dell'immagine:
        $stmt2=$pdo->prepare("UPDATE Immagine SET formato = $obj->getImmagine()->getFormato(), size = $obj->getImmagine()->getSize(), byte = $obj->getImmagine()->getByte(), larghezza = $obj->getImmagine()->getLarghezza(), altezza = $obj->getImmagine()->getAltezza(), mime = $obj->getImmagine->getMime() WHERE nome=?");
        $ris2 = $stmt2->execute([$nomeOldImg]);

        if ($ris1=true & $ris2=true){
            return true;
        }
        else{
            return false;
        }
    }
}