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
            $formato = $prodotto->getImmagine()->getFormato();
            $tmp = array(
                'id' => $prodotto->getId(),
                'nome' => $prodotto->getNome(),
                'marca' => $prodotto->getMarca(),
                'descrizione' => $prodotto->getDescrizione(),
                'prezzo' => $prodotto->getPrezzo(),
                'dati' => $img,
                'formato' => $formato
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
    public static function recuperaAggiungiProdotto(){
        $v = new VGestioneProdotto();
        $v->mostraAggiuntaProdotto();
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
        if((!isset($_FILES["image"])) || ($_FILES["image"]["error"] != UPLOAD_ERR_OK)) {
            echo "Errore nell'invio del file. Riprova!";
        }
        // Connessione e selezione del database
        $pm=FPersistentManager::getInstance();
        // Recupero delle informazioni sul file inviato

        $file=base64_encode((file_get_contents($_FILES["image"]['tmp_name'])));


        //$nome_file_temporaneo = $_FILES["file_inviato"]["image"];
        $nome_file_vero = $_FILES["image"]["name"];
        $tipo_file = $_FILES["image"]["type"];
        //$dati_file = file_get_contents($nome_file_temporaneo);
        //$dati_file = addslashes($dati_file);
        $imm=new EImmagine($nome_file_vero,$tipo_file,$file);
        $prodotto = new EProdotto($_POST['nome'],$_POST['marca'],$_POST['descrizione'],$_POST['quantita'],$imm,$_POST['prezzo'],$_POST['tipologia']);
        $pm->store($prodotto);
        $v=new VGestioneProdotto();
        $v->mostraAggiuntaProdotto();



    }
//reindirizzamento  tramite url (Front Controller) alla pagina del prodotto corrispondente all'id del prodotto cliccato??
    public static function recuperaDettagli(string $id){
        $pm=FPersistentManager::getInstance();
        $prodotto=$pm->load('FProdotto',$id);
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
        $v=new VGestioneProdotto();
        $v->mostraDettagli($prod);

    }

    public static function recuperaProdotto(){
        $pm=FPersistentManager::getInstance();
        if($_POST['selection']=='tipologia'){
            $prodottirec=$pm->prelevaProdottiByTip($_POST['ricerca']);
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
                    'mime' => $mime
                );
                $prodotti[]=$tmp;
            }
            $v=new VGestioneProdotto();
            $v->mostraProdotti($prodotti);
        }

    }




}