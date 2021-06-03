<?php


class VVisualizzareBuoniSconto
{
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
        $this->setDataIntoTemplate('results', $dati); //vedi quale riferimento nel tpl
        $this->setTemplate('coupon-list.tpl');

    }

}