<?php
require_once 'StartSmarty.php';

class VGestionePunti
{
    private $smarty;

    public function __construct()
    {
        $this->smarty=StartSmarty::configuration();
    }

    public function mostraProfilo($utente){

        $this->smarty->assign("path", $GLOBALS["path"]);
        $this->smarty->assign('nome', $utente->getNome());
        $this->smarty->assign('cognome', $utente->getCogome());
        $this->smarty->assign('email', $utente->getEmail());
        $this->smarty->assign('punti', $utente->getPunti());
        $this->smarty->display('profilefe.tpl');                        
    }