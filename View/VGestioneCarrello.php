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
            $mime = $prod->getImmagine()->getFormato();
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
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('cart.tpl');
    }

    public function compilaOrdine(ECarrello $carrello, string $mailutente){
        $pm = FPersistentManager::getInstance();
        $prodotti = $carrello->getProdotti();
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

        $indirizzi = $pm->prelevaIndirizziUtente($mailutente);
        $arrIndirizzi = array();
        foreach ($indirizzi as $indirizzo) {
            $tmp = array(
                'indirizzo' => $indirizzo,
                'identificativo' => str_replace(" ", "_", $indirizzo->getVia()).":".$indirizzo->getNumero().":".$indirizzo->getCap(),
            );
            $arrIndirizzi[] = $tmp;
        }
        $this->smarty->assign('indirizzi', $arrIndirizzi);

        $carte = $pm->prelevaCarteUtente($mailutente);
        $arrCarte = array();
        foreach ($carte as $carta) {
            $tmp = array(
                'carta' => $carta,
                'numero' => $carta->getNumero(),
            );
            $arrCarte[] = $tmp;
        }
        $this->smarty->assign('carte', $arrCarte);


        $buoni = $pm->prelevaBuoni($mailutente);
        $arrBuoni = array();
        foreach ($buoni as $buono) {
            $tmp = array(
                'buono' => $buono,
                'codice' => $buono->getCodice(),
            );
            $arrBuoni[] = $tmp;
        }
        $this->smarty->assign('buoni', $arrBuoni);

        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('checkout.tpl');
    }

    public function mostraOrdine(EOrdine $ordine, string $nome, string $cognome, string $telefono) {
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
        $this->smarty->assign('nomeUtente', $nome." ".$cognome);
        $this->smarty->assign('telefono', $telefono);
        $this->smarty->assign('idTransazione', uniqid("TR"));
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('order-success.tpl');
    }

    public function ordineEmail(EOrdine $ordine, string $nome, string $cognome, string $mail) {
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
        $this->smarty->assign('prezzoCarrello',$carrello->getPrezzoTot());
        $this->smarty->assign('dataOrdine',$ordine->getDataAcquisto()->format('d-m-y'));
        $this->smarty->assign('dataConsegna',$ordine->getDataAcquisto()->add(new DateInterval('P10D'))
            ->format('d-m-y'));
        $this->smarty->assign('indirizzo', $ordine->getIndirizzo());
        $this->smarty->assign('prezzoTot', $ordine->getPrezzoTotale());
        $this->smarty->assign('nomeUtente', $nome." ".$cognome);
        $this->smarty->assign('path', $GLOBALS["path"]);

        return $this->smarty->fetch('email-order-success.tpl');
    }

    public function mostraCarrelliPreferiti(EUtenteReg $utente) {
        $pm = FPersistentManager::getInstance();
        $carrelli = $pm->prelevaCarrelliUtente($utente->getEmail());
        $arrCarrelli = array();
        foreach ($carrelli as $carrello) {
            $tmp = array(
                'idCarrello' => $carrello->getId(),
                'nomeCarrello' => $carrello->getNome(),
                'prezzoCarrello' => $carrello->getPrezzoTot(),
            );
            $arrProdotti = array();
            foreach ($carrello->getProdotti() as $idProd => $quantita) {
                $prod = $pm->load("FProdotto", $idProd);
                $tmp1 = array(
                    'nome' => $prod->getNome(),
                    'prezzo' => $prod->getPrezzo(),
                    'quantita' => $quantita,
                    'totProd' => $quantita*$prod->getPrezzo(),
                );
                $arrProdotti[] = $tmp1;
            }
            $tmp['prodotti'] = $arrProdotti;
            $arrCarrelli[] = $tmp;
        }
        $this->smarty->assign('carrelli', $arrCarrelli);
        $this->smarty->assign('path', $GLOBALS["path"]);

        $this->smarty->display('carrelliPreferiti.tpl');
    }
}