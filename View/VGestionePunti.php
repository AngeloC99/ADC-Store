<?php
require_once 'StartSmarty.php';

class VGestionePunti
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    public function datiPuntiEmail(int $punti, string $email, string $messaggio){

        $this->smarty->assign('punti', $punti);
        $this->smarty->assign('sender-email',$email);
        $this->smarty->assign('messaggio', $messaggio);
        return $this->smarty->fetch('email-punti.tpl');
    }

    public function mostraFormPunti(){
        $this->smarty->display('formPunti.tpl');
    }

}