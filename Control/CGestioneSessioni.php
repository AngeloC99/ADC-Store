<?php


/**
 * La classe CGestioneSessioni si occupa della gestione delle sessioni. Si è utilizzato il design pattern Singleton.
 * Class CGestioneSessioni
 * @access public
 * @package Controller
 */

class CGestioneSessioni
{
    /**
     * Istanza del gestore delle sessioni.
     * @var CGestioneSessioni
     */
    private static $instance;

    /**
     * CGestioneSessioni constructor.
     */
    private function __construct() {}

    /**
     * @return CGestioneSessioni
     */
    public static function getInstance(): CGestioneSessioni{
        if (self::$instance == null) {
            self::$instance = new CGestioneSessioni();
        }
        return self::$instance;
    }

    /**
     * Metodo che inizializza una sessione.
     */
    private function iniziaSessione(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Metodo che salva il carrello in sessione.
     * @param $carrello
     */
    public function salvaCarrello($carrello) {
        $this->iniziaSessione();
        $_SESSION["carrello"] = serialize($carrello);
    }

    /**
     * Metodo che carica il carrello della sessione.
     * @return array
     */
    public function caricaCarrello() {
        $this->iniziaSessione();
        $carrello = unserialize($_SESSION["carrello"]);
        //unset($_SESSION["carrello"]);
        return $carrello;
    }

    /**
     * Metodo che salva in sessione l'id di un prodotto.
     * @param $id
     */
    public function salvaProdId($id) {
        $this->iniziaSessione();
        $_SESSION["ProdId"] = $id;
    }

    /**
     * Metodo che ritorna l'id del prodotto salvato in sessione.
     * @return int
     */
    public function caricaProdId() {
        $this->iniziaSessione();
        $id = $_SESSION["ProdId"];
        unset($_SESSION["ProdId"]);
        return $id;
    }

    /**
     * Metodo che salva in sessione l'id di premio.
     * @param $id
     */
    public function salvaPremId($id) {
        $this->iniziaSessione();
        $_SESSION["PremId"] = $id;
    }

    /**
     * Metodo che ritorna l'id del premio salvato in sessione.
     * @return int
     */
    public function caricaPremId() {
        $this->iniziaSessione();
        $id = $_SESSION["PremId"];
        unset($_SESSION["PremId"]);
        return $id;
    }    

    /**
     * Metodo che si occupa di distruggere i dati relativi alla sessione in atto, compreso il cookie PHPSESSID.
     * @return bool
     */
    public function distruggiSessione(): bool {
        if (isset($_COOKIE["PHPSESSID"])) {
            $this->iniziaSessione();
            session_unset();
            session_destroy();
            setcookie("PHPSESSID", "", time() - 3600, "/");
            $bool = true;
        }
        return $bool;
    }

    /**
     * Metodo che ci permette di salvare l'utente in sessione.
     * @param $utente
     */
    public function salvaUtente($utente) {
        $this->iniziaSessione();
        session_regenerate_id(true);
        session_set_cookie_params(time() + 3600, "/", null, false, true); //http only cookie, add session.cookie_httponly=On on php.ini | Andrebbe inoltre inserito il 4° parametro
        // a TRUE per fare si che il cookie viaggi solo su HTTPS. E' FALSE perchè non abbiamo un certificato SSL ma in un contesto reale va messo a TRUE!!!
        $userSer = serialize($utente);

        if ( get_class($utente) == 'EUtenteReg' ) {
            $_SESSION['utente'] = $userSer;
            
        } else if ( get_class($utente) == 'EAmministratore' ) {
            $_SESSION['admin'] = $userSer;

        }
    }

    /**
     * Metodo che verifica se l'utente ha eseguito il login.
     * @return bool
     */
    public function isLoggedUser(): bool {
        $this->iniziaSessione();
        return (isset($_COOKIE["PHPSESSID"]) && (isset($_SESSION["utente"])));
    }
    /**
     * Metodo che verifica se l'amministratore ha eseguito il login.
     * @return bool
     */
    public function isLoggedAdmin(): bool {
        $this->iniziaSessione();
        return (isset($_COOKIE["PHPSESSID"]) && isset($_SESSION["admin"]));
    }
    /**
     * Metodo che restituisce l'utente registrato o l'amministratore (se loggati), oppure NULL.
     * @return mixed|null
     */
    public function caricaUtente() {

        $this->iniziaSessione();

        if(isset($_SESSION["utente"])){
            $utente =  $_SESSION["utente"];
            return unserialize($utente);

        } else if (isset($_SESSION["admin"])) {
            $admin =  $_SESSION["admin"];
            return unserialize($admin);
        }
    }

}