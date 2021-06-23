<?php


class VGestioneCarrello {
    private Smarty $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function mostraCarrello($carrello){
        $prodotti = $carrello->getProdotti();
        $pm = FPersistentManager::getInstance();
        $arrProdotti = array();
        foreach ($prodotti as $idProd => $quantita) {
            $prod = $pm->load("FProdotto", $idProd);
            $img = $prod->getImmagine()->getByte();
            $mime = $prod->getImmagine()->getMime();
            $tmp = array(
                'nome' => $prod->getNome(),
                'prezzo' => $prod->getPrezzo(),
                'quantita' => $quantita,
                'totProd' => $quantita*$prod->getPrezzo(),
                'image' => $img,
                'mime' => $mime
            );
            $arrProdotti[] = $tmp;
        }
        $this->smarty->assign('prodotti', $arrProdotti);

        $this->smarty->assign('cart',$carrello->getNome());
        $this->smarty->assign('prezzoTot', $carrello->getPrezzoTot());
        $this->smarty->display('cart.tpl');
    }

    public function compilaOrdine(ECarrello $carrello, EUtenteReg $utente){
        $prodotti = $carrello->getProdotti();
        $pm = FPersistentManager::getInstance();
        $arrProdotti = array();
        foreach ($prodotti as $idProd => $quantita) {
            $prod = $pm->load("FProdotto", $idProd);
            $tmp = array(
                'nome' => $prod->getNome(),
                'prezzo' => $prod->getPrezzo(),
                'quantita' => $quantita,
                'totProd' => $quantita*$prod->getPrezzo(),
            );
            $arrProdotti[] = $tmp;
        }
        $this->smarty->assign('prodotti', $arrProdotti);
        $this->smarty->assign('prezzoTot', $carrello->getPrezzoTot());

        $indirizzi = array();
        foreach ($utente->getIndirizzi() as $ind) {
            $indirizzi[] = $ind->toString();
        }
        $carte = array();
        foreach ($utente->getCarteSalvate() as $carta) {
            $carte[] = $carta->toString();
        }
        $this->smarty->assign('indirizzi', $indirizzi);
        $this->smarty->assign('carte', $carte);

        $this->smarty->display('checkout.tpl');
    }

    public function mostraOrdine(EOrdine $ordine) {
        $carrello = $ordine->getCarrello();
        $prodotti = $carrello->getProdotti();
        $pm = FPersistentManager::getInstance();
        $arrProdotti = array();
        foreach ($prodotti as $idProd => $quantita) {
            $prod = $pm->load("FProdotto", $idProd);
            $tmp = array(
                'nome' => $prod->getNome(),
                'prezzo' => $prod->getPrezzo(),
                'quantita' => $quantita,
                'totProd' => $quantita*$prod->getPrezzo(),
            );
            $arrProdotti[] = $tmp;
        }
        $this->smarty->assign('prodotti', $arrProdotti);
        $this->smarty->assign('idOrdine',$ordine->getId());
        $this->smarty->assign('dataOrdine',$ordine->getDataAcquisto()->format('d-m-y'));
        $this->smarty->assign('dataConsegna',$ordine->getDataAcquisto()->add(new DateInterval('P10D'))
                                                            ->format('d-m-y'));
        $this->smarty->assign('indirizzo', $ordine->getIndirizzo());
        $this->smarty->assign('prezzoTot', $ordine->getPrezzoTotale());

        $this->smarty->display('order-success.tpl');
    }
}