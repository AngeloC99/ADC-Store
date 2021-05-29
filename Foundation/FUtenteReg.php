<?php


class FUtenteReg
{
    public static function exist($email)  : bool
    {

        $pdo = FConnectionDB2::connect();
        $query = "SELECT * FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([":email" => $email]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        FConnectionDB2::closeConnection();

        if (count($rows) == 0){
            return false;
        }
        else{
            return true;
        }

    }

    public static function delete($email) : bool{
        $pdo = FConnectionDB::connect();
        $query = "DELETE FROM UtenteReg WHERE email= :email";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute([":email" => $email]);
        if ($ris==true){
            return true;
        }
        else{
            return false;
        }

    }

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

        if ($ris==true ){
            return true;
        }
        else{
            return false;
        }
    }

    public static function update($obj1) : bool{
        $pdo = FConnectionDB::connect();
        $query = "UPDATE UtenteReg SET nome = :nome, cognome = :cognome, password = :password, punti = :punti  WHERE email = :email";
        $stmt=$pdo->prepare($query);
        $ris = $stmt->execute(array(
            ":nome" => $obj1->getNome(),
            ":cognome" => $obj1->getCognome(),
            ":password" => $obj1->getPassword(),
            ":punti" => $obj1->getPunti(),
            ":email" => $obj1->getEmail()));

        if ($ris==true){
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * Salva un indirizzo associato ad un utente nel database e restituisce un valore booleano che indica l'esito
     * dell'operazione.
     * @param EIndirizzo $indirizzo
     * @param string $mailutente
     * @return bool
     */
    public static function salvaIndirizzoUtente(EIndirizzo $indirizzo, string $mailutente): bool {
        $ris = FIndirizzo::store($indirizzo);
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO UtenteSalvaIndirizzo VALUES(:mailutente, :via, :numero, :cap)";
        $stmt = $pdo->prepare($query);
        $ris1 = $stmt->execute(array(
            ':via' => $indirizzo->getVia(),
            ':numero' => $indirizzo->getNumero(),
            ':cap' => $indirizzo->getCap(),
            ':mailutente' => $mailutente));

        return $ris AND $ris1;
    }

    /**
     * Elimina l'indirizzo che l'utente vuole cancellare dal database e restituisce un valore booleano che indica l'esito
     * dell'operazione.
     * @param string $via
     * @param string $numerocivico
     * @param string $cap
     * @param string $mailutente
     * @return bool
     */
    public static function eliminaIndirizzoUtente(string $via, string $numerocivico, string $cap, string $mailutente): bool {
        $ris = FIndirizzo::delete($via, $numerocivico, $cap);

        $pdo = FConnectionDB::connect();
        $query = "DELETE FROM UtenteSalvaIndirizzo 
                WHERE via = :via AND numerocivico = :numero AND cap = :cap AND mailutente = :mailutente";
        $stmt = $pdo->prepare($query);
        $ris1 = $stmt->execute(array(
            ':via' => $via,
            ':numero' => $numerocivico,
            ':cap' => $cap,
            ':mailutente' => $mailutente));

        return $ris AND $ris1;
    }

    /**
     * Restituisce tutte le istanze di EIndirizzo presenti nell'apposita tabella del database ed appartenenti ad un
     * determinato EUtenteReg.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaIndirizziUtente(string $mailutente): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM UtenteSalvaIndirizzo INNER JOIN Indirizzo 
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
    public static function salvaCartaUtente(ECartaCredito $carta, string $mailutente): bool {
        $ris = FCartaCredito::store($carta);

        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO UtenteUsaCarta VALUES(:mailutente, :numerocarta)";
        $stmt = $pdo->prepare($query);
        $ris1 = $stmt->execute(array(
            ':mailutente' => $mailutente,
            ':numerocarta' => $carta->getNumero()));

        return $ris AND $ris1;
    }

    /**
     * Elimina la carta di credito che l'utente vuole cancellare dal database e restituisce un valore booleano che
     * indica l'esito dell'operazione.
     * @param string $numero
     * @param string $mailutente
     * @return bool
     */
    public static function eliminaCartaUtente(string $numero, string $mailutente): bool {
        $ris = FCartaCredito::delete($numero);

        $pdo = FConnectionDB::connect();
        $query = "DELETE FROM UtenteUsaCarta WHERE mailutente = :mailutente AND numerocarta = :numerocarta";
        $stmt = $pdo->prepare($query);
        $ris1 = $stmt->execute(array(':mailutente' => $mailutente,':numerocarta' => $numero));

        return $ris AND $ris1;
    }

    /**
     * Restituisce tutte le istanze di ECartaCredito presenti nell'apposita tabella del database ed appartenenti ad un
     * determinato utente.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaCarteUtente(string $mailutente): array {
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