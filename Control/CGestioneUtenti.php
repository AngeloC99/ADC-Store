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
    public static function login(string $email, string $password){

        //Richiami a foundation, FUtente, Famministratore, uso di sessioni ecc
    }

}