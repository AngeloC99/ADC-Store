<?php


class VGestioneCartaCredito {
    private Smarty $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function mostraCarte($utente){
        $pm = FPersistentManager::getInstance();
        $carte = $pm->prelevaCarteUtente($utente->getEmail());
        $carteArr = array();
        foreach ($carte as $carta) {
            $tmp = array(
                'numeroReale' => $carta->getNumero(),
                'numero' => substr($carta->getNumero(), 0, 4)."************",
                'titolare' => $carta->getTitolare(),
                'circuito' => $carta->getCircuito(),
                'cvv' => substr($carta->getCvv(), 0, 1)."**",
                'ammontare' => $carta->getAmmontare(),
                'scadenza' => $carta->getScadenza()->format("d-m-y"),
            );
            $carteArr[] = $tmp;
        }
        $this->smarty->assign('carte', $carteArr);
        $this->smarty->assign("path", $GLOBALS["path"]);

        $this->smarty->display('gestioneCarte.tpl');
    }
}