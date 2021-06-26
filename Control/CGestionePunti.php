<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//require('C:\Users\david\public_html\ProgettoEsame\PHPMailer-master\src\PHPMailer.php');
//require('C:\Users\david\public_html\ProgettoEsame\PHPMailer-master\src\Exception.php');
//require('C:\Users\david\public_html\ProgettoEsame\PHPMailer-master\src\SMTP.php');


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

        $pm=FPersistentManager::getInstance();
        $premirec=$pm->prelevaPremi();
        $premi=array();
        foreach ($premirec as $key=>$item) {
            $premio=$pm->load('FPremio',$key);
            $img = $premio->getImmagine()->getByte();
            $mime = $premio->getImmagine()->getFormato();
            $tmp = array(
                'nome' => $premio->getNome(),
                'marca' => $premio->getMarca(),
                'descrizione' => $premio->getDescrizione(),
                'punti' => $premio->getPrezzoInPunti(),
                'dati' => $img,
                'mime' => $mime
            );
            $premi[]=$tmp;
        }
        $v=new VGestionePunti();
        $v->mostraPremi($premi);
    }

    /**
     * Seleziona un singolo premio
     * @param string $id
     * @return EPremio
     */
    public static function selezionaPremio(string $id) { //id del prodotto deve essere recuperato da qualche parte

        $pm=FPersistentManager::getInstance();
        $premio=$pm->load('FPremio',$id);
        /*$prize=array(
            'nome'=>$premio->getNome(),
            'id'=>$premio->getId(),
            'marca'=>$premio->getMarca(),
            'descrizione'=>$premio->getDescrizione(),
            'punti'=>$premio->getPrezzoInPunti(),
            'quantita'=>$premio->getQuantita(),
            'mime'=>$premio->getImmagine()->getFormato(),
            'dati'=>$premio->getImmagine()->getByte());*/
        $v=new VGestionePunti();
        $v->mostraDettagliPremio($premio);
    }

    /**
     * @param EPremio $premio
     * @param EIndirizzo $indirizzo
     * @param int $quantita
     * @param EUtenteReg $utente
     */
    public static function acquistaPremio(string $id){ //Si deve recuperare l'utente

        $pm = FPersistentManager::getInstance();
        //$user = $pm->load('FUtenteReg', $utente->getEmail());
        $user = $pm->load('FUtenteReg', 'adarossi@gmail.com');        
        $prize = $pm->load('FPremio', $id); 
        $punti = $prize->getPrezzoInPunti() * $_POST['quantita'];
        if ($punti <= $user->getPunti()){
            $user->setPunti($user->getPunti() - $punti);
            $prize->setQuantita($prize->getQuantita() - $_POST['quantita']);
            $pm->update($user);
            $pm->update($prize);

            return true;
        }
        else{
            print('ciao');

            return false;
        }

        $v = new VGestioneSchermate();
        $v->showHome();
        //Gestire eccezioni se utente non ha abbastanza punti o se non c'è quantità a sufficienza di prodotti
        //Alla conferma appare un alert e il premio viene spedito all'indirizzo predefinito dell'utente

    }

    /**
     * Metodo da usare quando un utente A vuole regalare parte dei suoi punti ad un utente B
     * @param int $punti
     * @param string $email
     * @param EUtenteReg $sender
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function regalarePunti(){ //Non necessario passare l'utente

        $pm = FPersistentManager::getInstance();
        $receiver = $pm->load("FUtenteReg", $_POST['emaildest']);
        $sender = $pm->load('FUtenteReg', 'adarossi@gmail.com');
        if ($sender->getPunti() >= $_POST['punti']) {
            $sender->setPunti($sender->getPunti() - $_POST['punti']);
            $receiver->setPunti($receiver->getPunti() + $_POST['punti']);
            $pm->update($receiver);
            $pm->update($sender);

            $mail = new PHPMailer(true);
            try{
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
                $mail->SetFrom('adcstore@gmail.com');
                $mail->Subject = "ADC Store - HAI RICEVUTO DEI PUNTI!";
                $mail->AddAddress($_POST['emaildest']);
            //--------------------------------------------------
                $v=new VGestionePunti();
                $mail->Body = $v->datiPuntiEmail($_POST['punti'], $sender->getNome(), $sender->getCognome(), $_POST['Messaggio']);
                $v->mostraFormPunti();
                $mail->send();
             } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }   
    
        }
        else{   //gestire eccezione si non si hanno abbastanza punti (con template dedicato)
            print('ciao');

        };

    }

    /**
     * Metodo che usa l'amministratore per aaggiungere nel database un nuovo premio
     * @param string $nome
     * @param string $mar
     * @param string $des
     * @param int $qua
     * @param EImmagine $imm
     * @param int $punti
     */
    public static function aggiungiPremio(): void{

        if((!isset($_FILES["file_inviato"])) || ($_FILES["file_inviato"]["error"] != UPLOAD_ERR_OK)) {
        echo "Errore nell'invio del file. Riprova!";
        }
        // Connessione e selezione del database
        $pm=FPersistentManager::getInstance();
        // Recupero delle informazioni sul file inviato

        $nome_file_temporaneo = $_FILES["file_inviato"]["tmp_name"];
        $nome_file_vero = $_FILES["file_inviato"]["name"];
        $tipo_file = $_FILES["file_inviato"]["type"];
        // Leggo il contenuto del file

        $dati_file = file_get_contents($nome_file_temporaneo);
        $dati_file = addslashes($dati_file);
        $imm=new EImmagine($nome_file_vero,$tipo_file,$dati_file);


        $premio = new EPremio($_POST['nome'],$_POST['marca'],$_POST['descrizione'],$_POST['quantita'],$imm,$_POST['punti']);
        $pm->store($premio);
        $v = new VGestionePunti();
        $v->mostraAggiungiPremi();

    }

}