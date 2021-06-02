<?php

/**
 * La classe FOrdine garantisce la permanenza dei dati per la classe EOrdine.
 * Class FOrdine
 * @package Foundation
 */

class FOrdine
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EOrdine nell'apposita
     * tabella del database.
     * @param string $id
     * @return bool
     */
    public static function exist(string $id): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Ordine WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) == 0) { return false; }
        else { return true; }
    }


    /**
     * Carica in RAM l'istanza di EOrdine che possiede la chiave primaria fornita.
     * @param string $id
     * @return EOrdine
     * @throws Exception
     */
    public static function load(string $id) : EOrdine {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("SELECT * FROM Ordine WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = new DateTime($rows[0]['dataacquisto']);
            $prezzo = $rows[0]['prezzototale'];
            $idCarr = $rows[0]['idcarrello'];
            $via = $rows[0]['viaConsegna'];
            $numero = $rows[0]['numerocivicoConsegna'];
            $cap = $rows[0]['capConsegna'];
            $carrello = FCarrello::load($idCarr);
            $ind = FIndirizzo::load($via, $numero, $cap);
            $ris = new EOrdine($carrello, $ind);
            $ris->setPrezzoTotale($prezzo);
            $ris->setDataAcquisto($data);
            $pdo->commit();
            return $ris;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    /**
     * Memorizza un'istanza di EOrdine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param EOrdine $ordine
     * @return bool
     */
    public static function store(EOrdine $ordine): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO Ordine VALUES(:id, :dataacquisto, :prezzototale, :idcarrello, :viaConsegna, :numerocivicoConsegna, :capConsegna)";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(array(
            ':id' => $ordine->getId(),
            ':dataacquisto' => $ordine->getDataAcquisto()->format('y-m-d'),
            ':prezzototale' => $ordine->getPrezzoTotale(),
            ':idcarrello' => $ordine->getCarrello()->getId(),
            ':viaConsegna' => $ordine->getIndirizzo()->getVia(),
            ':numerocivicoConsegna' => $ordine->getIndirizzo()->getNumero(),
            ':capConsegna' => $ordine->getIndirizzo()->getCap()));

        return $ris;
    }

    /**
     * Aggiorna i valori di un'istanza di EOrdine sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param EOrdine $ordine
     * @return bool
     */
    public static function update(EOrdine $ordine): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE Ordine SET dataacquisto = :dataacquisto, prezzototale= :prezzototale, 
                        idcarrello = :idcarrello, viaConsegna = :viaConsegna, numerocivicoConsegna = :numerocivicoConsegna,
                        capConsegna = :capConsegna WHERE id = :id");
        $ris = $stmt->execute(array(
            ':dataacquisto' => $ordine->getDataAcquisto()->format('y-m-d'),
            ':prezzototale' => $ordine->getPrezzoTotale(),
            ':idcarrello' => $ordine->getCarrello()->getId(),
            ':viaConsegna' => $ordine->getIndirizzo()->getVia(),
            ':numerocivicoConsegna' => $ordine->getIndirizzo()->getNumero(),
            ':capConsegna' => $ordine->getIndirizzo()->getCap(),
            ':id' => $ordine->getId()));

        return $ris;
    }

    /**
     * Risveglia in RAM la lista degli utenti meno attivi, ovvero quelli che hanno effettuato l'ultimo ordine più di
     * un mese fa.
     * @return array
     */
    public static function recuperaUtentiInattivi(): array{
        try {
        $pdo = FConnectionDB::connect();
        $pdo->beginTransaction();
        //recupera tutti gli ordini effettuati meno di un mese fa
        $stmt = $pdo->prepare("SELECT * FROM Ordine WHERE dataacquisto <= :data");
        $stmt2 = $pdo->prepare("SELECT * FROM Ordine WHERE dataacquisto > :data");
        $datarif = new DateTime('-1 month');
        $stmt->execute([':data'=>$datarif->format('Y-m-d')]);
        $stmt2->execute([':data'=>$datarif->format('Y-m-d')]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); //ordini precedenti alla data di riferimento
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC); //ordini successivi
        $old=array();
        $new=array();
        foreach ($rows as $row){
            $stmt3 = $pdo->prepare("SELECT * FROM Carrello WHERE id = :id");
            $stmt3->execute([':id'=>$row['idcarrello']]);
            $carrelli=$stmt3->fetchAll(PDO::FETCH_ASSOC);
            $utente=FUtenteReg::load($carrelli[0]['mailutente']);
            $old[]=$utente;
        }
        foreach ($rows2 as $row){
            $stmt3 = $pdo->prepare("SELECT * FROM Carrello WHERE id = :id");
            $stmt3->execute([':id'=>$row['idcarrello']]);
            $carrelli=$stmt3->fetchAll(PDO::FETCH_ASSOC);
            $utente=FUtenteReg::load($carrelli[0]['mailutente']);
            $new[]=$utente;
            }
        $utenti=array();
        foreach ($old as $us){
            if (in_array($us,$new)==false){
                $utenti[]=$us;
            }
        }
        $pdo->commit();
        }
        catch (PDOException $e){
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
        return $utenti;
    }

    /**
     * Cancella un'istanza di EOrdine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $id
     * @return bool
     */
    public static function delete(string $id): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM Ordine WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);

        return $ris;
    }
}