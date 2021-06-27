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
    public static function recuperaClientiInattivi(): array{

        $pm = FPersistentManager::getInstance();
        return $pm->prelevaUtentiInattivi();
    }

    public static function recuperaClienti(): array
    {
        $pm = FPersistentManager::getInstance();
        $clientirec = $pm->prelevaUtenti();
        $clienti = array();
        foreach ($clientirec as $item) {
            $el = array(
                'nome' => $item->getNome(),
                'cognome' => $item->getCognome(),
                'email' => $item->getEmail(),
                'password' => $item->getPassword(),
                'punti' => $item->getPunti());
            $clienti[] = $el;
        }
        $v = new VGestioneUtenti();
        $v->mostraClienti($clienti);

    }

    /**
     * Seleziona il cliente referenziato dalla mail che viene passata
     * @param string $email
     */
    public static function selezionaCliente(string $email)
    {

        $pm = FPersistentManager::getInstance();
        return $pm->load("FUtenteReg", $email);
    }



    /**
     * Crea e salva nel database un nuovo utente che vuole registrarsi
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public static function registra(): void
    {
        $utente = new EUtenteReg($_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['password']);
        $pm = FPersistentManager::getInstance();
        $pm->store($utente);
        $v=new VGestioneUtenti();
        $v->mostraLogin();
    }


    /**
     * Metodo che gestisce il login secondo le credenziali che vengono passate
     */
    public static function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        self::verificaLogin($email, $password);
    }

    public static function verificaLogin($email, $password)
    {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if ($pm->exist("FAmministratore", $email)) {
            $admin = $pm->load("FAmministratore", $email);
            if (password_verify($password, $admin->getPassword())) {
                $gs->salvaUtente($admin);
                header("Location: " . $GLOBALS['path'] . "GestioneSchermate/recuperaHomeAdmin");
            } else {
                header("Location: " . $GLOBALS['path'] . "GestioneSchermate/recuperaLogin");
            }
        } else if ($pm->exist("FUtenteReg", $email)) {
            $utente = $pm->load("FUtenteReg", $email);
            if (password_verify($password, $utente->getPassword())) { //QUESTO CHECK NON VA...risolvere con gli altri
                $gs->salvaUtente($utente);
                $gs->salvaCarrello(new ECarrello());
                header("Location: ".$GLOBALS['path'] ."GestioneSchermate/recuperaHomeUtente");
            } else {
                header("Location: ".$GLOBALS['path'] ."GestioneSchermate/recuperaLogin");
            }
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recuperaLogin");
        }
    }


    public static function logout(){
        $gs = CGestioneSessioni::getInstance();
        $gs->distruggiSessione();
        header("Location: ".$GLOBALS['path']."GestioneSchermate/recuperaLogin");
    }

    public static function recuperaCreazioneAccount(){
        $v=new VGestioneUtenti();
        $v->mostraCreazioneAccount();

    }


}
