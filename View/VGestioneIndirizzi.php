<?php


class VGestioneIndirizzi {
    private Smarty $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function mostraIndirizzi(EUtenteReg $utente){
        $pm = FPersistentManager::getInstance();
        $indirizzi = $pm->prelevaIndirizziUtente($utente);
        $indArr = array();
        foreach ($indirizzi as $indirizzo) {
            $tmp = array(
                'via' => $indirizzo->getVia(),
                'numero' => $indirizzo->getNumero(),
                'cap' => $indirizzo->getCap(),
                'comune' => $indirizzo->getComune(),
                'provincia' => $indirizzo->getProvincia(),
            );
            $indArr[] = $tmp;
        }
        $this->smarty->assign('indirizzi', $indArr);

        $this->smarty->display('gestioneIndirizzi.tpl');
    }
}