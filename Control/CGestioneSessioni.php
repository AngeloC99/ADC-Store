<?php


/**
 * Nella classe SessionManager sono presenti tutti i metodi neccessari a gestire le sessioni per il nostro progetto.
 * Class CGestioneSessioni
 * @access public
 * @author Lofrumento - Di Santo - Susanna
 * @package Controller
 */

class CGestioneSessioni
{
    /**
     * Istanza della classe.
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
     * Funzione che inizializza lo status della sessione.
     */
    private function iniziaSessione(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Funzione che salva i biglietti in sessione.
     * @param $biglietti
     */
    public function salvaCarrello($carrello) {
        $this->iniziaSessione();
        $_SESSION["carrello"] = serialize($carrello);
    }

    /**
     * Funzione che carica dalla sessione i biglietti acquistati.
     * @return array
     */
    public function caricaCarrello() {
        $this->iniziaSessione();
        $carrello = unserialize($_SESSION["carrello"]);
        unset($_SESSION["carrello"]);
        return $carrello;
    }

    /**
     * Funzione che salva in sessione l'id di un particolare film con il quale si sta interagendo.
     * @param $id
     */
    public function salvaProdId($id) {
        $this->iniziaSessione();
        $_SESSION["ProdId"] = $id;
    }

    /**
     * Funzione che restituisce l'id del film salvato in sessione.
     * @return int
     */
    public function caricaProdId() {
        $this->iniziaSessione();
        $id = $_SESSION["ProdId"];
        unset($_SESSION["ProdId"]);
        return $id;
    }

    /**
     * Funzione che salva in sessione l'id di un particolare film con il quale si sta interagendo.
     * @param $id
     */
    public function salvaPremId($id) {
        $this->iniziaSessione();
        $_SESSION["PremId"] = $id;
    }

    /**
     * Funzione che restituisce l'id del film salvato in sessione.
     * @return int
     */
    public function caricaPremId() {
        $this->iniziaSessione();
        $id = $_SESSION["PremId"];
        unset($_SESSION["PremId"]);
        return $id;
    }    

    /**
     * Funzione che distrugge la sessione ed il relativo Cookie PHPSESSID
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
     * Funzione che ci permette di salvare l'utente in sessione.
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
     * Funzione che ci permette di verificare se l'utente è loggato nel sistema.
     * @return bool
     */
    public function isLogged(): bool {
        $this->iniziaSessione();
        return isset($_COOKIE["PHPSESSID"]) && (isset($_SESSION["utente"]) || isset($_SESSION["admin"]) );
    }

    /**
     * Funzione che restituisce l'utente se quest'ultimo è un Registrato o NonRegistrato. Restituisce NULL altrimenti.
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