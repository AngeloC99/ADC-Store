<?php

/**
 * VGestioneProdotto si occupa di riempire con i dati ricevuti dallo strato Control (o di inoltrare dati compilati tramite form allo strato Control) le varie viste associate ai prodotti.
 * Class VGestioneProdotto
 */
class VGestioneProdotto {

    /**
     * @var Smarty
     */
    private $smarty;

    /**
     * VGestioneProdotto constructor.
     */
    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    /**
     * Metodo per mostrare la schermata relativa all'aggiunta di un prodotto.
     * @param $utente
     * @throws SmartyException
     */
    public function mostraAggiuntaProdotto($utente){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome',$utente->getNome());
        $this->smarty->display('add-product.tpl');

    }

    /**
     * Metodo che permette di mostrare la lista dei prodotti
     * @param $prodotti
     * @throws SmartyException
     */
    public function mostraProdotti($prodotti){
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("loggatoUser", $gs->isLoggedUser());
        $this->smarty->assign("loggatoAdmin", $gs->isLoggedAdmin());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('prodotti',$prodotti);
        $this->smarty->display('category-page(infinite-scroll).tpl');
    }

    /**
     * Metodo che permette di mostrare i dettagli del prodotto selezionato (fornito come parametro) lato utente.
     * @param $prod
     * @throws SmartyException
     */
    public function mostraDettagli($prod){
        $gs = CGestioneSessioni::getInstance();
        $this->smarty->assign("loggato", $gs->isLoggedUser());
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('prod',$prod);
        $this->smarty->display('product-page(accordian).tpl');
    }

    /**
     * Metodo che permette di mostrare i dettagli del prodotto selezionato (fornito come parametro) lato admin.
     * @param $prod
     * @throws SmartyException
     */
    public function mostraDettagliProdAdmin($prod){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('prod',$prod);
        $this->smarty->display('product-page(accordianAdmin).tpl');
    }
}
