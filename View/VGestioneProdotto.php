<?php

class VGestioneProdotto {

    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    public function setTemplate($temp){
        $this->smarty->assign($temp);
    }

    public function setDataIntoTemplate($rif,$valore){
        $this->smarty->assign($rif,$valore);

    }

    public function showResults( $dati ) {
        $this->setDataIntoTemplate('results', $dati);
        $this->setTemplate('product-detail.tpl');

    }
}
