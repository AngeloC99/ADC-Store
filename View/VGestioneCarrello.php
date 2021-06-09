<?php


class VGestioneCarrello
{
    public static function mostraCarrello($carrello){
        $smarty=StartSmarty::configuration();
        $carrello->setNome("Bel Carrello");
        $prodotti = $carrello->getProdotti();
        $pm = FPersistentManager::getInstance();
/*
        foreach ($prodotti as $idProd => $quantita) {
            $prod = $pm->load("FProdotto", $idProd);
            $smarty->assign('nomeProdotto', $prod->getNome());
            $smarty->assign('prezzo', $prod->getPrezzo());
            $smarty->assign('quantita', $quantita);
            $smarty->assign('totProd', $quantita*$prod->getPrezzo());
        }

*/
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
        $smarty->display('cart.tpl');
    }
}