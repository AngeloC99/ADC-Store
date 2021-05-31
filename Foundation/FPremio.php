<?php


class FPremio
{
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

    public static function delete(string $key): bool
    {
        try {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE id=:id");
        $stmt->execute(["id" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $idImm=$rows[0]['idImmagine'];
        $pdo->beginTransaction();
        $ris2=FImmagine::delete($idImm);
        $stmt2=$pdo->prepare("DELETE FROM Premio WHERE id=:id");
        $ris=$stmt2->execute([":id" => $key]);
        return $ris && $ris2;

        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    public static function load(string $nome) :EPremio
    {
        //try{
        $pdo=FConnectionDB::connect();
        //$pdo->beginTransaction();
        $stmt=$pdo->prepare("SELECT * FROM Premio WHERE nome=:nome");
        $stmt->execute([":nome" => $nome]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $punti=$rows[0]['punti'];
        $desc=$rows[0]['descrizione'];
        $quant=$rows[0]['quantita'];
        $marca=$rows[0]['marca'];
        $id=$rows[0]['id'];
        $img=$rows[0]['nomeImmagine'];
        $imm=FImmagine::load($img);
        $premio= new EPremio($nome,$marca,$desc,$quant,$imm,$punti);
        $premio->setId($id);
        return $premio;
       /** }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }*/

    }

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
        return $ris && $ris2;

        }
        catch (PDOException $e){
            return $e->getMessage();
            $pdo->rollBack();
        }
    }

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
        return $ris1 && $ris2;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }
    public static function PrelevaPerPunti(int $p): array{
        try{
            $pdo=FConnectionDB::connect();
            $pdo->beginTransaction();
            $immagini=FImmagine::prelevaImmagini();
            $stmt = $pdo->prepare("SELECT * FROM Premio WHERE punti <= :punti");
            $stmt->execute([":punti"=>$p]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $premi = array();
            foreach ($rows as $row) {
                    $premio=new EPremio($row['nome'],
                    $row['marca'],
                    $row['descrizione'],
                    $row['quantita'],
                    $immagini[$row['idImmagine']],
                    $row['punti']);
                $premi[]=$premio;
            }
            return $premi;
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }

    }
}
