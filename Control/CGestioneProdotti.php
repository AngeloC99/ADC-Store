<?php


/**
 * Classe controller per la gestione dei prodotti
 * Class CGestioneProdotti
 */
class CGestioneProdotti
{
    public static function recuperaProdotti(){
        $pm=FPersistentManager::getInstance();
        $prodottirec=$pm->prelevaProdotti();
        $prodotti=array();
        foreach ($prodottirec as $key=>$item) {
            $prodotto=$pm->load('FProdotto',$key);
            $img = $prodotto->getImmagine()->getByte();
            $mime = $prodotto->getImmagine()->getFormato();
            $tmp = array(
                'nome' => $prodotto->getNome(),
                'marca' => $prodotto->getMarca(),
                'descrizione' => $prodotto->getDescrizione(),
                'prezzo' => $prodotto->getPrezzo(),
                'dati' => $img,
                'mime' => $mime
            );
            $prodotti[]=$tmp;
        }
        $v=new VGestioneProdotto();
        $v->mostraProdotti($prodotti);

    }

    /**
     * Modifica la quantità di un prodotto nel database
     * @param string $id
     * @param int $q
     */
    public static function modificaQuantita(string $id, int $q): void {

        $pm = FPersistentManager::getInstance();
        $prod = $pm->load('FProdotto',$id);
        $prod->setQuantita($q);

        $pm->update($prod);

    }

    /**
     * Modifica il prezzo di un prodotto presente nel database
     * @param string $id
     * @param float $p
     */
    public static function modificaPrezzo(string $id, float $p): void {

        $pm = FPersistentManager::getInstance();
        $prod = $pm->load('FProdotto',$id);
        $prod->setPrezzo($p);

        $pm->update($prod);

    }

    /**
     * Metodo che serve all'amministratore per aggiungere un prodotto nel database
     * @param string $n
     * @param string $m
     * @param string $d
     * @param int $q
     * @param EImmagine $f
     * @param float $p
     * @param string $t
     */
    public static function aggiungiProdotto(string $n, string $m, string $d, int $q, EImmagine $f, float $p, string $t): void {

        $pm = FPersistentManager::getInstance();
        $prod = new EProdotto($n,$m,$d,$q,$f,$p,$t);
        $pm->store($prod);

    }
//reindirizzamento  tramite url (Front Controller) alla pagina del prodotto corrispondente all'id del prodotto cliccato??
    public static function recuperaDettagli(string $id){
        $pm=FPersistentManager::getInstance();
        $prodotto=$pm->load('FProdotto',$id);
        $prod=array(
            'nome'=>$prodotto->getNome(),
            'marca'=>$prodotto->getMarca(),
            'descrizione'=>$prodotto->getDescrizione(),
            'prezzo'=>$prodotto->getPrezzo(),
            'tipologia'=>$prodotto->getTipologia(),
            'quantita'=>$prodotto->getQuantita(),
            'mime'=>$prodotto->getImmagine()->getFormato(),
            'dati'=>base64_encode($prodotto->getImmagine()->getByte()));
        $v=new VGestioneProdotto();
        $v->mostraDettagli($prod);
        
        

    }


}