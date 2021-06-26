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
        $v = new VGesioneUtenti();
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

    /**
     * Metodo che gestisce il login secondo le credenziali che vengono passate
     * @param string $email
     * @param string $password
     */
    public static function login() {

        if (self::isLogged()) {
            header("Location: /~david/ProgettoEsame/");

            $username = $_POST["username"];
            $password = $_POST["password"];

            self::checkLogin($username, $password);
        } ;

    }

    public static function verificaLogin($username, $password){

        $pm = FPersistentManager::getInstance();
    }

}