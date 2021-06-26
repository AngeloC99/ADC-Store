<?php

class VGestioneProdotto {

    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }
    public function mostraAggiuntaProdotto(EAmministratore $admin){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome',$admin->getNome());
        $this->smarty->display('add-product.tpl');

    }
    public function mostraProdotti($prodotti){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('prodotti',$prodotti);
        $this->smarty->display('category-page(infinite-scroll).tpl');
    }
    public function mostraDettagli($prod){
        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('prod',$prod);
        $this->smarty->display('product-page(accordian).tpl');
    }
}
