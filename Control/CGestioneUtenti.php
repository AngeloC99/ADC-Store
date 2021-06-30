<?php


/**
 * Classe controller per la gestione degli utenti
 * Class CGestioneUtenti
 */
class CGestioneUtenti
{
    /**
     * Recupera tutti gli utenti presenti del database
     * @return array
     */
    public static function recuperaClienti()
    {
        $pm = FPersistentManager::getInstance();
        $clientirec = $pm->prelevaUtenti();
        $clienti = array();
        foreach ($clientirec as $item) {
            $el = array(
                'nome' => $item->getNome(),
                'cognome' => $item->getCognome(),
                'email' => $item->getEmail(),
                'password' => $item->getPassword());
            $clienti[] = $el;
        }
        $v = new VGestioneUtenti();
        $v->mostraClienti($clienti);

    }

    /**
     * Crea e salva nel database un nuovo utente dopo compilazione dell'apposito form di registrazione.
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public static function registra()
    {
        $utente = new EUtenteReg($_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['password']);
        $pm = FPersistentManager::getInstance();
        $pm->store($utente);
        $v=new VGestioneUtenti();
        $v->mostraLogin();
    }


    /**
     * Metodo che gestisce il login utente
     */
    public static function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        self::verificaLogin($email, $password);
    }

    /**
     * Metodo che gestisce il login utente (controllo credenziali)
     */
    public static function verificaLogin($email, $password)
    {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if ($pm->exist("FUtenteReg", $email)) {
            $utente = $pm->load("FUtenteReg", $email);
            if (password_verify($password, $utente->getPassword())) {
                $gs->salvaUtente($utente);
                $gs->salvaCarrello(new ECarrello());
                header("Location: ".$GLOBALS['path'] ."GestioneSchermate/recuperaHome");
            } else {
                header("Location: ".$GLOBALS['path'] ."GestioneSchermate/recuperaLogin");
            }
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recuperaLogin");
        }
    }

    /**
     * Metodo che gestisce il login dell'admin
     */
    public static function loginAdmin()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        self::verificaLoginAdmin($email, $password);
    }

    /**
     * Metodo che gestisce il login admin (controllo credenziali)
     */
    public static function verificaLoginAdmin($email, $password)
    {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if ($pm->exist("FAmministratore", $email)) {
            $admin = $pm->load("FAmministratore", $email);
            if (password_verify($password, $admin->getPassword())) {
                $gs->salvaUtente($admin);
                header("Location: " . $GLOBALS['path'] . "GestioneSchermate/recuperaHome");
            } else {
                header("Location: " . $GLOBALS['path'] . "GestioneSchermate/recuperaLoginAdmin");
            }
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/showHome");
        }
    }


    /**
     * Metodo che gestisce il logout (sia di un utente che di un admin)
     */
    public static function logout(){
        $gs = CGestioneSessioni::getInstance();
        $gs->distruggiSessione();
        header("Location: ".$GLOBALS['path']."GestioneSchermate/showHome");
    }

    /**
     * Metodo che permette di recuperare la schermata per la creazione di un account (form registrazione).
     */
    public static function recuperaCreazioneAccount(){
        $v=new VGestioneUtenti();
        $v->mostraCreazioneAccount();

    }


}
