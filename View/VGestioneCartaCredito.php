<?php


class VGestioneCartaCredito {
    private Smarty $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    public function mostraCarte(EUtenteReg $utente){
        $pm = FPersistentManager::getInstance();
        $carte = $pm->prelevaCarteUtente($utente);
        $carteArr = array();
        foreach ($carte as $carta) {
            $tmp = array(
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

        $this->smarty->display('gestioneCarte.tpl');
    }
}