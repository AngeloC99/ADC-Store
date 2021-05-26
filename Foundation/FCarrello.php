<?php

/**
 * La classe FCarrello garantisce la permanenza dei dati per la classe ECarrello.
 * Class FCarrello
 * @package Foundation
 */

class FCarrello implements FBase
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di ECarrello nell'apposita
     * tabella del database.
     * @param $id
     * @param $key2
     * @param $key3
     * @return bool
     */
    public static function exist($id, $key2 = null, $key3 = null): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Carrello WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);
        return $ris;
    }

    /**
     * Carica in RAM l'istanza di ECarrello che possiede la chiave primaria fornita.
     * @param $id
     * @param $key2
     * @param $key3
     * @return ECarrello
     */
    public static function load($id, $key2 = null, $key3 = null) : ECarrello {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Carrello WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $rows[0]['nome'];
        $mail = $rows[0]['mailutente'];
        $carrello = new ECarrello();
        $carrello->setId($id);
        $carrello->setNome($nome);


        // MAIL ?????

        self::prelevaProdottiDalCarrello($carrello);
        return $carrello;
    }

    /**
     * Memorizza un'istanza di ECarrello sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param ECarrello $carrello
     * @param string $mailutente
     * @return bool
     */
    public static function store(ECarrello $carrello, string $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO Carrello VALUES(:id, :nome, :mailutente)";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(array(
            ':id' => $carrello->getId(),
            ':nome' => $carrello->getNome(),
            ':mailutente' => $mailutente));
        self::salvaProdottiNelCarrello($carrello);
        return $ris;
    }

    /**
     * Aggiorna i valori di un'istanza di ECarrello sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param $carrello
     * @return bool
     */
    public static function update($carrello): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE Carrello SET nome = :nome WHERE id = :id");
        $ris = $stmt->execute([':nome' => $carrello->getNome()]);
        self::salvaProdottiNelCarrello($carrello);
        return $ris;
    }

    /**
     * Cancella un'istanza di ECarrello sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $id
     * @param $key2
     * @param $key3
     * @return bool
     */
    public static function delete($id, $key2 = null, $key3 = null): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM Carrello WHERE id = :id");
        $ris = $stmt->execute([':id' => $id]);
        $stmt1 = $pdo->prepare("DELETE FROM Contiene WHERE idcarrello = :idcarrello");
        $ris1 = $stmt1->execute([':idcarrello' => $id]);
        return $ris AND $ris1;
    }

    /**
     * Restituisce tutte le istanze di ECarrello presenti nell'apposita tabella del database.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaCarrelli(string $mailutente): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Carrello INNER JOIN UtenteUsaCarta 
                                ON CartaCredito.numero = UtenteUsaCarta.numero 
                                WHERE UtenteUsaCarta.mailutente = :mailutente");
        $stmt->execute([':mailutente' => $mailutente]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $carrelli = array();
        foreach ($rows as $row) {
            $car = new ECarrello();
            $car->setId($row['id']);
            $car->setNome($row['nome']);
            self::prelevaProdottiDalCarrello($car);
            $carrelli[] = $car;
        }
        return $carrelli;
    }

    /**
     * Ripristina i prodotti contenuti in un carrello.
     * @param ECarrello $carrello
     */
    private static function prelevaProdottiDalCarrello(ECarrello $carrello): void {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Prodotto INNER JOIN Contiene 
                                ON Prodotto.id = Contiene.idprodotto 
                                WHERE Contiene.idcarrello = :idcarrello");
        $stmt->execute([':idcarrello' => $carrello->getId()]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $prod = FProdotto::load($row['nome']);
            $carrello->aggiungiProdotto($prod, $row['quantitaNelCarrello']);
        }
    }

    /**
     * Salva i prodotti contenuti in un carrello.
     * @param ECarrello $carrello
     */
    private static function salvaProdottiNelCarrello(ECarrello $carrello): void {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("INSERT INTO Contiene VALUES (:idcarrello, :idprodotto, :quantitaNelCarrello)");
        foreach ($carrello->getProdotti() as $idprod => $quantita) {
            $stmt->execute(array(':idcarrello' => $carrello->getId(),
                            ':idprodotto' => $idprod,
                            ':quantitaNelCarrello' => $quantita));
        }
    }
}