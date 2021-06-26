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
    public static function recuperaClienti(): array{

        $pm = FPersistentManager::getInstance();
        return $pm->prelevaUtentiInattivi();
    }

    /**
     * Seleziona il cliente referenziato dalla mail che viene passata
     * @param string $email
     * @return EUtenteReg
     */
    public static function selezionaCliente(string $email): EUtenteReg {

        $pm = FPersistentManager::getInstance();
        return $pm->load("FUtenteReg",$email);
    }

    public static function apriProfilo(){

        $pm = FPersistentManager::getInstance();
        $utente = $pm->load('FUtenteReg', "adarossi@gmail.com");
        $v = new VGestioneUtenti();
        $v->mostraProfilo($utente);        
    }

    /**
     * Crea e salva nel database un nuovo utente che vuole registrarsi
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public static function registra(string $nome, string $cognome, string $email, string $password): void{

        $utente = new EUtenteReg($nome,$cognome,$email,$password);
        $pm = FPersistentManager::getInstance();
        $pm->store($utente);
    }

    public static function recuperaLogin() {
        $v = new VGestioneUtenti();
        $v->mostraLogin();
    }

    /**
     * Metodo che gestisce il login secondo le credenziali che vengono passate
     */
    public static function login() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        self::verificaLogin($email, $password);
    }

    public static function verificaLogin($email, $password){
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if ($pm->exist("FAmministratore", $email)) {
            $admin = $pm->load("FAmministratore", $email);
            if(password_verify($password, $admin->getPassword())) {
                $gs->salvaUtente($admin);
                header("Location: ".$GLOBALS['path']."GestioneUtenti/recuperaHomeAdmin");
            }
            else {
                header("Location: ".$GLOBALS['path']."GestioneUtenti/recuperaLogin");
            }
        }
        else if ($pm->exist("FUtenteReg", $email)) {
            $utente = $pm->load("FUtenteReg", $email);
            if(password_verify($password, $utente->getPassword())) {
                $gs->salvaUtente($utente);
                header("Location: ".$GLOBALS['path']."GestioneUtenti/recuperaHomeUtente");
            }
            else {
                header("Location: ".$GLOBALS['path']."GestioneUtenti/recuperaLogin");
            }
        }
        else {
            header("Location: ".$GLOBALS['path']."GestioneUtenti/recuperaLogin");
        }
    }

    public static function recuperaHomeUtente() {
        $v = new VGestioneUtenti();
        $v->mostraHomeUtente();
    }

    public static function recuperaHomeAdmin() {
        $v = new VGestioneUtenti();
        $v->mostraHomeAdmin();
    }

    public static function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ".$GLOBALS['path']."GestioneUtenti/recuperaHomeAdmin/login");
    }
}