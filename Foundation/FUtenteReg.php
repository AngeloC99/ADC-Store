<?php


/**
 * La classe FUtenteReg garantisce la permanenza dei dati per la classe EUtenteReg.
 * Class FCarrello
 * @package Foundation
 */

class FUtenteReg
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EUtenteReg nell'apposita
     * tabella del database.
     * @param $email
     * @return bool
     */
    public static function exist($email)  : bool
    {

        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([":email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) == 0){
            return false;
        }
        else{
            return true;
        }

    }

    /**
     * Cancella un'istanza di EUtenteReg sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $email
     * @return bool
     */
    public static function delete($email) : bool{
        $pdo = FConnectionDB::connect();
        $query = "DELETE FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute([":email" => $email]);

        return $ris;

    }

    /**
     * Carica in RAM l'istanza di EUtenteReg che possiede la chiave primaria fornita.
     * @param $email
     * @return EUtenteReg
     */
    public static function load($email) : EUtenteReg
    {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(["email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $nome=$rows[0]['nome'];
        $cognome=$rows[0]['cognome'];
        $email=$rows[0]['email'];
        $password=$rows[0]['password'];
        $punti = $rows[0]['punti'];

        $user = new EUtenteReg($nome,$cognome,$email,$password);
        $user->setPunti($punti);

        return $user;

    }

    /**
     * Memorizza un'istanza di EUtenteReg sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param $obj
     * @return bool
     */
    public static function store($obj) : bool
    {
        $pdo = FConnectionDB::connect();
        $query="INSERT INTO UtenteReg VALUES(:email,:nome,:cognome,:pw,:punti)";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":email" => $obj->getEmail(),
            ":nome" => $obj->getNome(),
            ":cognome" => $obj->getCognome(),
            ":pw" => $obj->getPassword(),
            ":punti" => $obj->getPunti()));
        ;
        return $ris;


    }

    /**
     * Aggiorna i valori di un'istanza di EUtenteReg sul database e restituisce un booleano che indica l'esito
     * @param $obj
     * @return bool
     */
    public static function update($obj) : bool{
        $pdo = FConnectionDB::connect();
        $query = "UPDATE UtenteReg SET nome = :nome, cognome = :cognome, password = :password, punti = :punti  WHERE email = :email";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":nome" => $obj->getNome(),
            ":cognome" => $obj->getCognome(),
            ":password" => $obj->getPassword(),
            ":punti" => $obj->getPunti(),
            ":email" => $obj->getEmail()));

        return $ris;

    }

    /**
     * Restituisce tutti gli utenti registrati che sono nella tabella UtenteReg
     * @return array
     */
    public static function prelevaUtenti() : array {
        $pdo = FConnectionDB::connect();
        $query = "SELECT * FROM UtenteReg";
        $stmt=$pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $utenti = array();
        foreach ($rows as $row) {
            $user = new EUtenteReg(
                $row['nome'],
                $row['cognome'],
                $row['email'],
                $row['password']);
            $utenti[] = $user;
        }
        return $utenti;
    }


    /**
     * Salva un indirizzo associato ad un utente nel database e restituisce un valore booleano che indica l'esito
     * dell'operazione.
     * @param EIndirizzo $indirizzo
     * @param string $mailutente
     * @return bool
     */
    public static function salvaIndirizzo(EIndirizzo $indirizzo, string $mailutente): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $query = "INSERT INTO UtenteSalvaIndirizzo VALUES(:mailutente, :via, :numero, :cap)";
            $stmt = $pdo->prepare($query);
            $ris1 = $stmt->execute(array(
                ':via' => $indirizzo->getVia(),
                ':numero' => $indirizzo->getNumero(),
                ':cap' => $indirizzo->getCap(),
                ':mailutente' => $mailutente));

            $ris = FIndirizzo::store($indirizzo);
            $pdo->commit();


            return $ris AND $ris1;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Elimina l'indirizzo che l'utente vuole cancellare dal database e restituisce un valore booleano che indica l'esito
     * dell'operazione.
     * @param string $via
     * @param int $numerocivico
     * @param string $cap
     * @param string $mailutente
     * @return bool
     */
    public static function eliminaIndirizzo(string $via, int $numerocivico, string $cap, string $mailutente): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $query = "DELETE FROM UtenteSalvaIndirizzo 
                WHERE via = :via AND numerocivico = :numero AND cap = :cap AND mailutente = :mailutente";
            $stmt = $pdo->prepare($query);
            $ris1 = $stmt->execute(array(
                ':via' => $via,
                ':numero' => $numerocivico,
                ':cap' => $cap,
                ':mailutente' => $mailutente));


            $ris = FIndirizzo::delete($via, $numerocivico, $cap);
            $pdo->commit();

            return $ris AND $ris1;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }

    }

    /**
     * Restituisce tutte le istanze di EIndirizzo presenti nell'apposita tabella del database ed appartenenti ad un
     * determinato EUtenteReg.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaIndirizzi(string $mailutente): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Indirizzo INNER JOIN UtenteSalvaIndirizzo 
                            ON UtenteSalvaIndirizzo.via = Indirizzo.via AND
                               UtenteSalvaIndirizzo.numerocivico = Indirizzo.numerocivico AND
                               UtenteSalvaIndirizzo.cap = Indirizzo.cap
                               WHERE UtenteSalvaIndirizzo.mailutente = :mailutente");
        $stmt->execute([':mailutente' => $mailutente]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $indirizzi = array();
        foreach ($rows as $row) {
            $ind = new EIndirizzo($row['via'],
                $row['numerocivico'],
                $row['comune'],
                $row['provincia'],
                $row['cap'],
                $row['predefinito']);
            $indirizzi[] = $ind;
        }
        return $indirizzi;
    }

    /**
     * Salva una carta di credito associata ad un utente nel database e restituisce un valore booleano che indica
     * l'esito dell'operazione.
     * @param ECartaCredito $carta
     * @param string $mailutente
     * @return bool
     */
    public static function salvaCarta(ECartaCredito $carta, string $mailutente): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $query = "INSERT INTO UtenteUsaCarta VALUES(:mailutente, :numerocarta)";
            $stmt = $pdo->prepare($query);
            $ris1 = $stmt->execute(array(
                ':mailutente' => $mailutente,
                ':numerocarta' => $carta->getNumero()));

            $ris = FCartaCredito::store($carta);
            $pdo->commit();


            return $ris AND $ris1;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Elimina la carta di credito che l'utente vuole cancellare dal database e restituisce un valore booleano che
     * indica l'esito dell'operazione.
     * @param string $numero
     * @param string $mailutente
     * @return bool
     */
    public static function eliminaCarta(string $numero, string $mailutente): bool {
        try {
            $pdo = FConnectionDB::connect();
            $pdo->beginTransaction();
            $query = "DELETE FROM UtenteUsaCarta WHERE mailutente = :mailutente AND numerocarta = :numerocarta";
            $stmt = $pdo->prepare($query);
            $ris1 = $stmt->execute(array(':mailutente' => $mailutente,':numerocarta' => $numero));

            $ris = FCartaCredito::delete($numero);
            $pdo->commit();

            return $ris AND $ris1;

        } catch(PDOException $e) {
            print("ATTENTION ERROR: ") . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }

    /**
     * Restituisce tutte le istanze di ECartaCredito presenti nell'apposita tabella del database ed appartenenti ad un
     * determinato utente.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaCarte(string $mailutente): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM CartaCredito INNER JOIN UtenteUsaCarta 
                                ON CartaCredito.numero = UtenteUsaCarta.numero 
                                WHERE UtenteUsaCarta.mailutente = :mailutente");
        $stmt->execute([':mailutente' => $mailutente]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $carte = array();
        foreach ($rows as $row) {
            $carta = new ECartaCredito($row['titolare'],
                $row['numero'],
                $row['circuito'],
                $row['scadenza'],
                $row['cvv'],
                $row['ammontare']);
            $carte[] = $carta;
        }
        return $carte;
    }

}