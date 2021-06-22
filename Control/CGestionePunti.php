<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('..\PHPMailer-master\src\PHPMailer.php');
require('..\PHPMailer-master\src\Exception.php');
require('..\PHPMailer-master\src\SMTP.php');


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
    public static function recuperaPremi(): array {

        $pm = FPersistentManager::getInstance();
        return $pm->prelevaPremi();
    }

    /**
     * Seleziona un singolo premio
     * @param string $id
     * @return EPremio
     */
    public static function selezionaPremio(string $id): EPremio { //Funziona ma da errore all'immagine

        $pm = FPersistentManager::getInstance();
        return $pm->load("FPremio",$id);
    }

    /**
     * @param EPremio $premio
     * @param EIndirizzo $indirizzo
     * @param int $quantita
     * @param EUtenteReg $utente
     */
    public static function acquistaPremio(EPremio $premio, EIndirizzo $indirizzo, int $quantita, EUtenteReg $utente): void{ //Non necessario passare l'utente

        $punti = $premio->getPrezzoInPunti();

        //Problema: come gestire indirizzo nei premi visto che non c'è un ordine?
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
    public static function regalarePunti(int $punti, string $email, string $messaggio, EUtenteReg $sender){ //Non necessario passare l'utente

        $pm = FPersistentManager::getInstance();
        $receiver = $pm->load("FUtenteReg", $email);
        if ($sender->getPunti() >= $punti) {
            $sender->setPunti($sender->getPunti() - $punti);
            $receiver->setPunti($receiver->getPunti() + $punti);
            $pm->update($receiver);
            $pm->update($sender);

            $mail = new PHPMailer();
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
            $mail->Username = 'adcstore@gmail.com';
            $mail->Password = 'plutopluto';
            $mail->SetFrom($email);
            $mail->Subject = "ADC Store - HAI RICEVUTO DEI PUNTI!";
            $mail->AddAddress($email);
            //--------------------------------------------------
            $v=new VGestionePunti();
            $mail->Body = $v->datiPuntiEmail($punti, $sender->getEmail(), $messaggio);
            $v->mostraFormPunti();
            if(!$mail->Send()) {
                return false;
            } else {
                return true;
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
    public static function aggiungiPremio(string $nome, string $mar, string $des, int $qua, EImmagine $imm, int $punti): void{
        $premio = new EPremio($nome,$mar,$des,$qua,$imm,$punti);
        $pm = FPersistentManager::getInstance();
        $pm->store($premio);

    }

}