<?php

/**
 * Classe controller per la gestione dei prodotti.
 * Class CGestioneProdotti
 */
class CGestioneProdotti
{

    /**
     * Metodo che permette di recuperare la lista dei prodotti presenti nel db e di inoltrarli alla View relativa.
     */
    public static function recuperaProdotti(){
        $pm=FPersistentManager::getInstance();
        $prodottirec=$pm->prelevaProdotti();
        $prodotti=array();
        foreach ($prodottirec as $key=>$prodotto) {
            $img = $prodotto->getImmagine()->getByte();
            $formato = $prodotto->getImmagine()->getFormato();
            $tmp = array(
                'id' => $prodotto->getId(),
                'nome' => $prodotto->getNome(),
                'marca' => $prodotto->getMarca(),
                'descrizione' => $prodotto->getDescrizione(),
                'prezzo' => $prodotto->getPrezzo(),
                'quantita' => $prodotto->getQuantita(),
                'dati' => $img,
                'formato' => $formato
            );
            $prodotti[]=$tmp;
        }
        $v=new VGestioneProdotto();
        $v->mostraProdotti($prodotti);

    }

    /**
     * Metodo che permette di recuperare la View relativa all'aggiunta di un prodotto
     */
    public static function recuperaAggiungiProdotto(){
        $gs=CGestioneSessioni::getInstance();
        if ($gs->isLoggedAdmin()){
            $utente=$gs->caricaUtente();
            $v = new VGestioneProdotto();
            $v->mostraAggiuntaProdotto($utente);
        }
        else{
            CGestioneSchermate::recupera401();

        }
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
    public static function aggiungiProdotto(){
        $gs=CGestioneSessioni::getInstance();
        if ($gs->isLoggedAdmin()) {
            $utente=$gs->caricaUtente();
            if ((!isset($_FILES["image"])) || ($_FILES["image"]["error"] != UPLOAD_ERR_OK)) {
                echo "Errore nell'invio del file. Riprova!";
            }
            $pm = FPersistentManager::getInstance();
            $file = base64_encode((file_get_contents($_FILES["image"]['tmp_name'])));
            $nome_file_vero = $_FILES["image"]["name"];
            $tipo_file = $_FILES["image"]["type"];
            $imm = new EImmagine($nome_file_vero, $tipo_file, $file);
            $prodotto = new EProdotto($_POST['nome'], $_POST['marca'], $_POST['descrizione'], $_POST['quantita'], $imm, $_POST['prezzo'], $_POST['tipologia']);
            $pm->store($prodotto);
            $v = new VGestioneProdotto();
            $v->mostraAggiuntaProdotto($utente);
        }
        else{
            CGestioneSchermate::recupera401();
        }
    }

    /**
     * Metodo che permette di recuperare il prodotto dal db a partire dall'id fornito per recuperarne i dettagli, poi inoltrati all'apposita view.
     * @param string $id
     */
    public static function recuperaDettagli(string $id){
        $pm=FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if ($pm->exist("FProdotto", $id)) {
            $prodotto = $pm->load('FProdotto',$id);
            $prod=array(
                'id'=>$prodotto->getId(),
                'nome'=>$prodotto->getNome(),
                'marca'=>$prodotto->getMarca(),
                'descrizione'=>$prodotto->getDescrizione(),
                'prezzo'=>$prodotto->getPrezzo(),
                'tipologia'=>$prodotto->getTipologia(),
                'quantita'=>$prodotto->getQuantita(),
                'mime'=>$prodotto->getImmagine()->getFormato(),
                'dati'=>$prodotto->getImmagine()->getByte());
            $v = new VGestioneProdotto();
            if ($gs->isLoggedAdmin()){
                $v->mostraDettagliProdAdmin($prod);
            }
            else {
                $v->mostraDettagli($prod);
            }
        }
        else {
            CGestioneSchermate::recupera404();
        }
    }

    /**
     * Metodo che permette di recuperare dal db la lista dei prodotti aventi come tipologia/nome quella/o specificata/o nell'apposito form. Tali prodotti vengono poi visualizzati grazie al richiamo dell'apposita View.
     */
    public static function recuperaProdotto(){
        $pm=FPersistentManager::getInstance();
        if($_POST['selection']=='tipologia'){
            $prodottirec=$pm->prelevaProdottiByTip($_POST['ricerca']);
            $prodotti=array();
            foreach ($prodottirec as $key=>$prodotto) {
                $img = $prodotto->getImmagine()->getByte();
                $mime = $prodotto->getImmagine()->getFormato();
                $tmp = array(
                    'nome' => $prodotto->getNome(),
                    'marca' => $prodotto->getMarca(),
                    'descrizione' => $prodotto->getDescrizione(),
                    'prezzo' => $prodotto->getPrezzo(),
                    'dati' => $img,
                    'formato' => $mime
                );
                $prodotti[]=$tmp;
            }
            $v=new VGestioneProdotto();
            $v->mostraProdotti($prodotti);

        }
        else{
            $prodottirec=$pm->prelevaPerNome($_POST['ricerca']);
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
                    'formato' => $mime
                );
                $prodotti[]=$tmp;
            }
            $v=new VGestioneProdotto();
            $v->mostraProdotti($prodotti);
        }

    }

    /**
     * Metodo che permette di aggiornare la quantità di un prodotto nel db grazie ai dati ricevuti dalla view dopo la compilazione dell'apposito form.
     */
    public static function aggiornaQuantitaProdotto() {
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        if($gs->isLoggedAdmin()){
            $prodotto = $pm->load("FProdotto", $_POST['idProdotto']);
            $prodotto->setQuantita($prodotto->getQuantita() + $_POST['quantita']);
            $pm->update($prodotto);
            header("Location: ".$GLOBALS['path']."GestioneProdotti/recuperaDettagli/".$_POST['idProdotto']);
        }
        else {
            CGestioneSchermate::recupera401();
        }
    }

}