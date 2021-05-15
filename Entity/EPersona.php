<?php


/**
 * La classe persona è una superclasse che generalizza le sottoclassi amministratore e utente registrato
 */
class EPersona
{
    /**
     * Il nome con il quale una persona si registra
     * @var string
     */
    private string $nome;

    /**
     * Il cognome con il quale una persona si registra
     * @var string
     */
    private string $cognome;

    /**
     * L'email che una persona sceglie per registrarsi sullìapp
     * @var string
     */
    private string $email;

    /**
     * La password che una persona sceglie per registrarsi sull'app
     * @var string
     */
    private string $password;

    /**
     * Costruttore di una persona
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public function __construct(string $nome, string $cognome, string $email, string $password){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Metodo che ritorna il nome di una persona
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Metodo che ritorna il cognome di una persona
     * @return string
     */
    public function getCognome(): string
    {
        return $this->cognome;
    }

    /**
     * Metodo che ritorna l'email di una persona
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Metodo che ritorna la password di una persona
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Metodo per settare un nuovo nome
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * Metodo per settare un nuovo cognome
     * @param string $cognome
     */
    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    /**
     * Metodo per settare una nuova email
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Metodo per settare una nuova password
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Metodo che serve a modificare la quantità di un articolo
     * @param EArticolo $articolo
     * @param int $quantita
     */
    public function modificaQuantita(EArticolo $articolo, int $quantita, ){
        $articolo->setQuantita($quantita);
    }



}