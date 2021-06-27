<?php


class VGestioneIndirizzi {
    private Smarty $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function mostraIndirizzi($utente){
        $pm = FPersistentManager::getInstance();
        $indirizzi = $pm->prelevaIndirizziUtente($utente->getEmail());
        $indArr = array();
        foreach ($indirizzi as $indirizzo) {
            $tmp = array(
                'via' => $indirizzo->getVia(),
                'numero' => $indirizzo->getNumero(),
                'cap' => $indirizzo->getCap(),
                'comune' => $indirizzo->getComune(),
                'provincia' => $indirizzo->getProvincia(),
                'stringa' => str_replace(" ", "_", $indirizzo->getVia()).":".$indirizzo->getNumero().":".$indirizzo->getCap(),
            );
            $indArr[] = $tmp;
        }
        $this->smarty->assign('indirizzi', $indArr);
        $this->smarty->assign("path", $GLOBALS["path"]);

        $this->smarty->display('gestioneIndirizzi.tpl');
    }
}