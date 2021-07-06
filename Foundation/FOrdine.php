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
        $pdo->exec('LOCK TABLES Ordine WRITE, Prodotto WRITE, Immagine WRITE');
        $carrello = $ordine->getCarrello();
        $ris=false;
        if (self::validaAcquisto($carrello) == true) {
            self::aggiornaQuantita($carrello);
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
            $pdo->exec('UNLOCK TABLES');
        }
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

    /**
     * Metodo che controlla se le quantità dei prodotti nel carrello sono tali da poter procedere con l'acquisto.
     * @param ECarrello $carrello
     * @return bool
     */
    private static function validaAcquisto(ECarrello $carrello): bool
    {
        foreach ($carrello->getProdotti() as $idProdotto => $quantita) {
            $prodotto = FProdotto::load($idProdotto);
            if ($prodotto->getQuantita() >= $quantita) {
                $ris = true;
            } else {
                $ris = false;
                break;
            }
        }
        return $ris;
    }

    /**
     * Metodo che aggiorna la quantità dei prodotti a fronte di un acquisto
     * @param ECarrello $carrello
     */
    private static function aggiornaQuantita(ECarrello $carrello)
    {
        foreach ($carrello->getProdotti() as $idProdotto => $quantita) {
            $prodotto = FProdotto::load($idProdotto);
            $prodotto->setQuantita($prodotto->getQuantita() - $quantita);
            FProdotto::update($prodotto);
        }
    }
}




