<?php

/**
 * La classe FOrdine garantisce la permanenza dei dati per la classe EOrdine.
 * Class FOrdine
 * @package Foundation
 */

class FOrdine implements FBase
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EOrdine nell'apposita
     * tabella del database.
     * @param $id
     * @param $key2
     * @param $key3
     * @return bool
     */
    public static function exist($id, $key2 = null, $key3 = null): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Ordine WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);
        return $ris;
    }

    /**
     * Carica in RAM l'istanza di EOrdine che possiede la chiave primaria fornita.
     * @param $id
     * @param $key2
     * @param $key3
     * @return EOrdine
     */
    public static function load($id, $key2 = null, $key3 = null) : EOrdine {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Ordine WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = $rows[0]['dataacquisto'];
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
        return $ris;
    }

    /**
     * Memorizza un'istanza di EOrdine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $ordine
     * @param $mailutente
     * @return bool
     */
    public static function store($ordine, $mailutente = null): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO Ordine VALUES(:id, :dataacquisto, :prezzototale, :idcarrello, :viaConsegna, :numerocivicoConsegna, :capConsegna)";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(array(
            ':id' => $ordine->getId(),
            ':dataacquisto' => $ordine->getDataAcquisto(),
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
     * @param $ordine
     * @return bool
     */
    public static function update($ordine): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE Ordine SET dataacquisto = :dataacquisto, prezzototale= :prezzototale, 
                        idcarrello = :idcarrello, viaConsegna = :viaConsegna, numerocivicoConsegna = :numerocivicoConsegna,
                        capConsegna = :capConsegna WHERE id = :id");
        $ris = $stmt->execute(array(
            ':dataacquisto' => $ordine->getDataAcquisto(),
            ':prezzototale' => $ordine->getPrezzoTotale(),
            ':idcarrello' => $ordine->getCarrello()->getId(),
            ':viaConsegna' => $ordine->getIndirizzo()->getVia(),
            ':numerocivicoConsegna' => $ordine->getIndirizzo()->getNumero(),
            ':capConsegna' => $ordine->getIndirizzo()->getCap(),
            ':id' => $ordine->getId()));
        return $ris;
    }

    /**
     * Cancella un'istanza di EOrdine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $id
     * @param $key2
     * @param $key3
     * @return bool
     */
    public static function delete($id, $key2 = null, $key3 = null): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM Ordine WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);
        return $ris;
    }
}