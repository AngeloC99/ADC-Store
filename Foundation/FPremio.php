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
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $nomeImm=$rows['nomeImmagine'];
        $stmt=$pdo->prepare("DELETE FROM Premio WHERE id=?");
        $ris=$stmt->execute([$key]);
        $ris2=FImmagine::delete($nomeImm);
        if ($ris==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }
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
        $imm=FImmagine::load($img);
        $premio= new EPremio($nome,$marca,$desc,$quant,$imm,$punti);
        $premio->setId($id);
        return $premio;
    }

    public static function store($obj): bool
    {
        $pdo=FConnectionDB::connect();
        $query="INSERT INTO Premio VALUES(?,?,?,?,?,?,?)";
        $stmt=$pdo->prepare($query);
        $ris=$stmt->execute([$obj->getId(),$obj->getPrezzoInPunti(),$obj->getNome(),$obj->getDescrizione(),$obj->getQuantita(),$obj->getMarca(),$obj->getImmagine()->getNome()]);
        $ris2=FImmagine::store($obj->getImmagine());
        if ($ris==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }

    }

    public static function update($obj): bool //parametro di FBase da discutere
    {
        $pdo=FConnectionDB::connect();
        $stmt1 = $pdo->prepare("UPDATE Premio SET punti = $obj->getPrezzoInPunti(), nome = $obj->getNome(), descrizione = $obj->getDescrizione(), quantita = $obj->getQuantita(), marca = $obj->getMarca(), nomeImmagine = $obj->getImmagine()->getNome() WHERE id=?");
        $ris1 = $stmt1->execute([$obj->getId()]);
        $ris2 = FImmagine::update($obj->getImmagine());
        if ($ris1==true & $ris2==true){
            return true;
        }
        else{
            return false;
        }
    }
}
