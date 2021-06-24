<?php

class VGestioneProdotto {

    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }
    public function mostraAggiuntaProdotto(EAmministratore $admin){
        $this->smarty->assign('nome',$admin->getNome());
        $this->smarty->display('add-product.tpl');

    }
    public function mostraProdotti($prodotti){
        $this->smarty->assign('prodotti',$prodotti);
        $this->smarty->display('category-page(infinite-scroll).tpl');
    }
}
