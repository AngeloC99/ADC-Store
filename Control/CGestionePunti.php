<?php

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Classe Controller per gestire premi e punti
 * Class CGestionePunti
 */
class CGestionePunti
{
    /**
     * MRecupera tutti i premi presenti nel database
     * @return array
     */
    public static function recuperaPremi() {

        $gs=CGestioneSessioni::getInstance();    
        $pm=FPersistentManager::getInstance();
        if ($gs->isLoggedUser()){
            $premirec=$pm->prelevaPremi();
            $premi=array();
            foreach ($premirec as $key=>$item) {
                $premio=$pm->load('FPremio',$key);
                $img = $premio->getImmagine()->getByte();
                $mime = $premio->getImmagine()->getFormato();
                $tmp = array(
                    'nome' => $premio->getNome(),
                    'marca' => $premio->getMarca(),
                    'id' => $premio->getId(),
                    'descrizione' => $premio->getDescrizione(),
                    'punti' => $premio->getPrezzoInPunti(),
                    'dati' => $img,
                    'mime' => $mime
                );
                $premi[]=$tmp;
            }
            $v=new VGestionePunti();
            $v->mostraPremiUtente($premi);
        }

        else if ($gs->isLoggedAdmin()){
            $premirec=$pm->prelevaPremi();
            $premi=array();
            foreach ($premirec as $key=>$item) {
                $premio=$pm->load('FPremio',$key);
                $img = $premio->getImmagine()->getByte();
                $mime = $premio->getImmagine()->getFormato();
                $tmp = array(
                    'nome' => $premio->getNome(),
                    'marca' => $premio->getMarca(),
                    'id' => $premio->getId(),
                    'descrizione' => $premio->getDescrizione(),
                    'punti' => $premio->getPrezzoInPunti(),
                    'dati' => $img,
                    'mime' => $mime
                );
                $premi[]=$tmp;
            }
            $v=new VGestionePunti();
            $v->mostraPremiAdmin($premi);
        }        

        else{
            CGestioneSchermate::recupera401();
        }
    }

    /**
     * Seleziona un singolo premio
     * @param string $id
     * @return EPremio
     */
    public static function selezionaPremio(string $id) {

        $pm = FPersistentManager::getInstance();

        if ($pm->exist("FPremio", $id)) {

            $gs = CGestioneSessioni::getInstance();
            if ( $gs->isLoggedUser()){
                $pm=FPersistentManager::getInstance();
                $premio=$pm->load('FPremio',$id);
                $indirizzi = $pm->prelevaIndirizziUtente($gs->caricaUtente()->getEmail());
                $arrIndirizzi = array();
                foreach ($indirizzi as $indirizzo) {
                    $tmp = array(
                        'indirizzo' => $indirizzo,
                        'identificativo' => str_replace(" ", "_", $indirizzo->getVia()).":".$indirizzo->getNumero().":".$indirizzo->getCap(),
                    );
                    $arrIndirizzi[] = $tmp;
                }
                $v=new VGestionePunti();
                $v->mostraDettagliPremioUser($premio, $arrIndirizzi);
            }

            else if ( $gs->isLoggedAdmin()){
                $pm=FPersistentManager::getInstance();
                $premio=$pm->load('FPremio',$id);
                $v=new VGestionePunti();
                $v->mostraDettagliPremioAdmin($premio);

            }

            else{
                CGestioneSchermate::recupera401();
            }
        }            

        else {
        CGestioneSchermate::recupera404();
        }
    }    

    /**
     * @param EPremio $premio
     * @param EIndirizzo $indirizzo
     * @param int $quantita
     * @param EUtenteReg $utente
     */
    public static function acquistaPremio(string $id){

        $pm = FPersistentManager::getInstance();
        $gs = CGestioneSessioni::getInstance();
        if ($gs->isLoggedUser()) {
            $user = $gs->caricaUtente();
            $prize = $pm->load('FPremio', $id);
            $punti = $prize->getPrezzoInPunti() * $_POST['quantita']; 
            $user->setPunti($user->getPunti() - $punti);
            $prize->setQuantita($prize->getQuantita() - $_POST['quantita']);
            $pm->update($user);
            $pm->update($prize);
            $gs->salvaUtente($user);
            self::recuperaPremi();
        }

        else{
            CGestioneSchermate::recupera401();
        }
    }

    /**
     * Metodo richiamato dall'admin per aggiornare la quantità di un premio
     */
    public static function aggiornaQuantitaPremio() {
        $gs = CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        if($gs->isLoggedAdmin()){
            $premio = $pm->load("FPremio", $_POST['idPremio']);
            $premio->setQuantita($premio->getQuantita() + $_POST['quantita']);
            $pm->update($premio);
            header("Location: ".$GLOBALS['path']."GestionePunti/selezionaPremio/".$_POST['idPremio']);
        }
        else {
            CGestioneSchermate::recupera401();
        }
    }

    /**
     * Metodo da usare quando un utente A vuole regalare parte dei suoi punti ad un utente B
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function regalarePunti(){ 

        $gs=CGestioneSessioni::getInstance();
        $pm = FPersistentManager::getInstance();
        if ($gs->isLoggedUser()){
            if ( $pm->exist("FUtenteReg",$_POST["emaildest"]) ){

            $sender = $gs->caricaUtente();
            $receiver = $pm->load("FUtenteReg", $_POST['emaildest']);
            $sender->setPunti($sender->getPunti() - $_POST['punti']);
            $receiver->setPunti($receiver->getPunti() + $_POST['punti']);
            $pm->update($receiver);
            $pm->update($sender);
            $gs->salvaUtente($sender);

            $mail = new PHPMailer(true);
            try{
                $mail->CharSet = 'UTF-8';
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 0;
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->SMTPAuth = true;
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->IsHTML(true);
                $mail->Username = 'adcstore2021@gmail.com';
                $mail->Password = 'plutopluto';
                $mail->SetFrom('adcstore2021@gmail.com');
                $mail->Subject = "ADC Store - HAI RICEVUTO DEI PUNTI!";
                $mail->AddAddress($_POST['emaildest']);
                //--------------------------------------------------
                $v=new VGestionePunti();
                $mail->Body = $v->datiPuntiEmail($_POST['punti'], $sender->getNome(), $sender->getCognome(), $_POST['Messaggio']);
                $email = $sender->getEmail();
                $mail->send();
                $v1 = new VGestioneUtenti();
                $v1->mostraProfilo($sender);
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            } 
            else{
                header("Location: ".$GLOBALS['path']."GestioneSchermate/recuperaFormPunti");
            }  
        }
        else{
            CGestioneSchermate::recupera401();
        }            

    }

    /**
     * Metodo che usa l'amministratore per aaggiungere nel database un nuovo premio
     */
    public static function aggiungiPremio(): void{

        $gs=CGestioneSessioni::getInstance();

        if($gs->isLoggedAdmin()){
            if((!isset($_FILES["file_inviato"])) || ($_FILES["file_inviato"]["error"] != UPLOAD_ERR_OK)) {
            echo "Errore nell'invio del file. Riprova!";
            }
            // Connessione e selezione del database
            $pm=FPersistentManager::getInstance();
            $gs= CGestioneSessioni::getInstance();
            // Recupero delle informazioni sul file inviato

            $nome_file_temporaneo = $_FILES["file_inviato"]["tmp_name"];
            $nome_file_vero = $_FILES["file_inviato"]["name"];
            $tipo_file = $_FILES["file_inviato"]["type"];
            // Leggo il contenuto del file

            $dati_file = base64_encode(file_get_contents($nome_file_temporaneo));
            $dati_file = addslashes($dati_file);
            $imm=new EImmagine($nome_file_vero,$tipo_file,$dati_file);


            $premio = new EPremio($_POST['nome'],$_POST['marca'],$_POST['descrizione'],$_POST['quantita'],$imm,$_POST['punti']);
            $pm->store($premio);
            $admin = $gs->caricaUtente();
            $v = new VGestionePunti();
            $v->mostraAggiungiPremi($admin);
        }

        else{
            CGestioneSchermate::recupera401();
        }        

    }

    public static function recuperaAggiungiPremio() {
        $gs=CGestioneSessioni::getInstance();
        if ($gs->isLoggedAdmin()){
            $admin=$gs->caricaUtente();
            $v = new VGestionePunti();
            $v->mostraAggiungiPremi($admin);
        }
        else{
            CGestioneSchermate::recupera401();
        }
    }     

}