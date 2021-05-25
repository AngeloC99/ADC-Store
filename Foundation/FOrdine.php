<?php

/**
 * La classe FOrdine garantisce la permanenza dei dati per la classe EOrdine.
 * Class FOrdine
 * @access public
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
        $ris = $stmt->execute([':id' => $id]);
        return $ris;
    }

    /**
     * Carica in RAM l'istanza di EOrdine che possiede la chiave primaria fornita.
     * @param string $id
     * @return EOrdine
     */
    public static function load(string $id) : EOrdine {
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
        $carrello = FCarrello::load($id);
        $ind = FIndirizzo::load($via, $numero, $cap);
        $ordine = new EOrdine($carrello,$ind);
        return $ordine;
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
     * @param EOrdine $ordine
     * @return bool
     */
    public static function update(EOrdine $ordine): bool {
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
            ':capConsegna' => $ordine->getIndirizzo()->getCap()));
        return $ris;
    }

    /**
     * Cancella un'istanza di EOrdine sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $id
     * @return bool
     */
    public static function delete(string $numero): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM Ordine WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);
        return $ris;
    }
}