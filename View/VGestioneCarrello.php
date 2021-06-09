<?php


class VGestioneCarrello
{
    public static function mostraCarrello($carrello){
        $smarty=StartSmarty::configuration();
        $carrello->setNome("Bel Carrello");
        $prodotti = $carrello->getProdotti();
        $pm = FPersistentManager::getInstance();
        $arrProdotti = array();
        foreach ($prodotti as $idProd => $quantita) {
            $prod = $pm->load("FProdotto", $idProd);
            $tmp = array(
                'nome' => $prod->getNome(),
                'prezzo' => $prod->getPrezzo(),
                'quantita' => $quantita,
                'totProd' => $quantita*$prod->getPrezzo()
            );
            $arrProdotti[] = $tmp;
        }
        $smarty->assign('prodotti', $arrProdotti);

        $smarty->assign('cart',$carrello->getNome());
        $smarty->assign('prezzoTot', $carrello->getPrezzoTot());
        $smarty->display('cart.tpl');
    }
}