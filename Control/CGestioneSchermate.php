<?php


/**
 * Class CGestioneSchermate per gestire il semplice passaggio (senza dati in ingresso o in uscita) da una schermata all'altra.
 */
class CGestioneSchermate
{
    /**
     * Metodo che permette di recuperare la View che mostra la Home generale
     */
    public static function showHome(){
        $v = new VGestioneSchermate();
        $v->showHome();
    }

    /**
     * Metodo che permette di recuperare la View che mostra la schermata relativa all'errore sui cookie disabilitati.
     */
    public static function showCookie() {
        $v=new VGestioneSchermate();
        $v->mostraCookie();
    }

    /**
     * Metodo che permette di recuperare la View relativa al profilo utente. Tale view permette di aprire il tpl relativo al profilo dell'admin se dalla sessione risulta loggato l'amministratore o quello dell'utente se dalla sessione risulta loggato l'utente, altrimenti viene richiamata la schermata di accesso non autorizzato.
     */
    public static function apriProfilo(){
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $utente = $pm->load('FUtenteReg', $gs->caricaUtente()->getEmail());
            $v = new VGestioneUtenti();
            $v->mostraProfilo($utente);}
        else if($gs->isLoggedAdmin()){
            $utente = $pm->load('FAmministratore', $gs->caricaUtente()->getEmail());
            $v = new VGestioneUtenti();
            $v->mostraProfiloAdmin($utente);}
        else{
            header("Location: ".$GLOBALS['path']."GestioneSchermate/recupera401");
        }
    }

    /**
     * Metodo che permette di recuperare la schermata del login utente.
     */
    public static function recuperaLogin() {
        $v = new VGestioneUtenti();
        $v->mostraLogin();
    }

    /**
     * Metodo che permette di recuperare la schermata del login admin.
     */
    public static function recuperaLoginAdmin() {
        $v = new VGestioneUtenti();
        $v->mostraLoginAdmin();

        }

    /**
     * Metodo che permette di recuperare la schermata relativa alla home utente se dalla sessione risulta loggato un utente o
     */
    public static function recuperaHome() {
        $gs=CGestioneSessioni::getInstance();
        if($gs->isLoggedUser()){
            $v = new VGestioneUtenti();
            $v->mostraHomeUtente();
        }
        if($gs->isLoggedAdmin()){
            $v = new VGestioneUtenti();
            $v->mostraHomeAdmin();
        }
        else{
            header("Location: ".$GLOBALS['path']."GestioneSchermate/showHome");
        }
    }

    /**
     *Metodo che permettte di recuperare la form per regalare punti a qualcuno.
     */
    public static function recuperaFormPunti() {
        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        $utente = $pm->load('FUtenteReg', $gs->caricaUtente()->getEmail());
        $utenti = $pm->prelevaUtenti();
        foreach($utenti as $email=>$user){
            $users[]=$user->getEmail();

        }

        $v = new VGestionePunti();
        $v->mostraFormPunti($utente, $users);
    }

    /**
     * Metodo che reindirizza al Controller GestioneCartaCredito (metodo recuperaCarte)
     */
    public static function recuperaGestioneCarte() {
        header("Location: ".$GLOBALS['path']."GestioneCartaCredito/recuperaCarte");
    }

    /**
     * Metodo che reindirizza al Controller GestioneIndirizzi (metodo recuperaIndirizzi)
     */
    public static function recuperaGestioneIndirizzi() {
        header("Location: ".$GLOBALS['path']."GestioneIndirizzi/recuperaIndirizzi");
    }

    /**
     * Metodo che reindirizza al Controller GestioneCarrello (metodo recuperaCarrelliSalvati)
     */
    public static function recuperaGestioneCarrelliSalvati() {
        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrelliSalvati");
    }

    /**
     * Metodo che reindirizza al Controller GestioneCarrello (metodo recuperaCarrello)
     */
    public static function recuperaGestioneCarrello() {
        header("Location: ".$GLOBALS['path']."GestioneCarrello/recuperaCarrello");
    }

    /**
     *
     */
    public static function recuperaHomeUtente() {
        $v = new VGestioneUtenti();
        $v->mostraHomeUtente();
    }

    /**
     *
     */
    public static function recuperaHomeAdmin() {
        $v = new VGestioneUtenti();
        $v->mostraHomeAdmin();
    }


    /**
     * Metodo che richiama la schermata relativa all'aggiunta di un premio
     */
    public static function recuperaAggiungiPremi() {
        $v = new VGestionePunti();
        $v->mostraAggiungiPremi();
    }

    /**
     * Metodo che richiama la schermata relativa ai dettagli del team di sviluppo.
     */
    public static function chiSiamo() {
        $v = new VGestioneSchermate();
        $v->mostraChiSiamo();
    }

    /**
     * Metodo che richiama la schermata d'errore per accesso non autorizzato
     */
    public static function recupera401() {
        $v=new VGestioneSchermate();
        $v->mostra401();
    }

    /**
     * Metodo che richiama la schermata d'errore per pagina non trovata.
     */
    public static function recupera404() {
        $v=new VGestioneSchermate();
        $v->mostra404();
    }
}