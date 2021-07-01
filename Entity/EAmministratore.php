<?php


/**
 * Classe EAmministratore, sottoclasse di EPersona
 * Class EAmministratore
 */
class EAmministratore extends EPersona
{

    /**
     * EAmministratore constructor.
     * @param string $nome
     * @param string $cognome
     * @param string $email
     * @param string $password
     */
    public function __construct(string $nome, string $cognome, string $email, string $password)
    {
        parent::__construct($nome, $cognome, $email, $password);
    }


    /**
     * Metodo che crea un buono e lo assegna ad un utente
     * @param int $ammontare
     * @param EUtenteReg $utente
     * @param string $messaggio
     */
    public function preparaBuono(bool $percentuale,int $ammontare, string $messaggio){ //tolto utente come parametro
        $buono = new EBuonoSconto($percentuale,$ammontare, $messaggio);
        return $buono;

    }




}