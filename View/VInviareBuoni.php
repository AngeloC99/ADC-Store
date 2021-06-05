<?php


class VInviareBuoni
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    public function setTemplate($temp){
        $this->smarty->display($temp);
    }

    public function setDataIntoTemplate($rif,$valore){
        $this->smarty->assign($rif,$valore);
    }

}