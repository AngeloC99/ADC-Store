<?php

/**
 * La classe FCarrello garantisce la permanenza dei dati per la classe ECarrello.
 * Class FCarrello
 * @package Foundation
 */

class FCarrello
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di ECarrello nell'apposita
     * tabella del database.
     * @param $id
     * @return bool
     */
    public static function exist($id): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Carrello WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) == 0) { return false; }
        else { return true; }
    }

    /**
     * Carica in RAM l'istanza di ECarrello che possiede la chiave primaria fornita.
     * @param $id
     * @return ECarrello
     */
    public static function load($id) : ECarrello {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("SELECT * FROM Carrello WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $nome = $rows[0]['nome'];
            //$mail = $rows[0]['mailutente'];
            $carrello = new ECarrello();
            $carrello->setId($id);
            $carrello->setNome($nome);
            self::prelevaProdottiDalCarrello($carrello, $pdo);
            $pdo->commit();

            return $carrello;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }

    /**
     * Memorizza un'istanza di ECarrello appartenente ad un utente sul database e restituisce un booleano che
     * indica l'esito dell'operazione.
     * @param $carrello
     * @param $mailutente
     * @return bool
     */
    public static function store($carrello, $mailutente): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $query = "INSERT INTO Carrello VALUES(:id, :nome, :mailutente)";
            $stmt = $pdo->prepare($query);
            $ris = $stmt->execute(array(
                ':id' => $carrello->getId(),
                ':nome' => $carrello->getNome(),
                ':mailutente' => $mailutente));
            self::salvaProdottiNelCarrello($carrello, $pdo);
            $pdo->commit();

            return $ris;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Aggiorna i valori di un'istanza di ECarrello sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param $carrello
     * @return bool
     */
    public static function update($carrello): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("UPDATE Carrello SET nome = :nome WHERE id = :id");
            $ris = $stmt->execute([':nome' => $carrello->getNome(), ':id' => $carrello->getId()]);
            self::salvaProdottiNelCarrello($carrello, $pdo);
            $pdo->commit();

            return $ris;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Cancella un'istanza di ECarrello sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $id
     * @return bool
     */
    public static function delete($id): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("DELETE FROM Carrello WHERE id = :id");
            $ris = $stmt->execute([':id' => $id]);
            $stmt1 = $pdo->prepare("DELETE FROM Contiene WHERE idcarrello = :idcarrello");
            $ris1 = $stmt1->execute([':idcarrello' => $id]);
            $pdo->commit();
            return $ris AND $ris1;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Restituisce tutte le istanze di ECarrello presenti nell'apposita tabella del database.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaCarrelli(string $mailutente): array {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("SELECT * FROM Carrello WHERE mailutente = :mailutente");
            $stmt->execute([':mailutente' => $mailutente]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo->commit();
            $carrelli = array();
            foreach ($rows as $row) {
                $car = new ECarrello();
                $car->setId($row['id']);
                $car->setNome($row['nome']);
                self::prelevaProdottiDalCarrello($car, $pdo);
                $carrelli[] = $car;
            }

            return $carrelli;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
        }
    }


    /**
     * Ripristina i prodotti contenuti in un carrello.
     * @param ECarrello $carrello
     * @return void
     */
    private static function prelevaProdottiDalCarrello(ECarrello $carrello, PDO $pdo): bool {
            $stmt = $pdo->prepare("SELECT * FROM Prodotto INNER JOIN Contiene 
                                ON Prodotto.id = Contiene.idprodotto 
                                WHERE Contiene.idcarrello = :idcarrello");
            $ris = $stmt->execute([':idcarrello' => $carrello->getId()]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $prod = FProdotto::load($row['id']);
                $carrello->aggiungiProdotto($prod, $row['quantitaNelCarrello']);
            }
            return $ris;
    }

    /**
     * Salva i prodotti contenuti in un carrello.
     * @param ECarrello $carrello
     * @return void
     */
    private static function salvaProdottiNelCarrello(ECarrello $carrello, PDO $pdo): bool {
        $stmt = $pdo->prepare("INSERT INTO Contiene VALUES (:idcarrello, :idprodotto, :quantitaNelCarrello)");
        foreach ($carrello->getProdotti() as $idprod => $quantita) {
            $ris = $stmt->execute(array(':idcarrello' => $carrello->getId(),
                ':idprodotto' => $idprod,
                ':quantitaNelCarrello' => $quantita));
        }
        return $ris;
    }

}

