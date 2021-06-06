<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require('..\PHPMailer-master\src\PHPMailer.php');
require('..\PHPMailer-master\src\Exception.php');
require('..\PHPMailer-master\src\SMTP.php');


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

    }

    /**
     * Metodo da usare quando un utente A vuole regalare parte dei suoi punti ad un utente B
     * @param int $punti
     * @param string $email
     * @param EUtenteReg $sender
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function regalarePunti(int $punti, string $email, EUtenteReg $sender){ //Non necessario passare l'utente

        $pm = FPersistentManager::getInstance();
        $receiver = $pm->load("FUtenteReg", $email, 'pluto');
        if ($sender->getPunti() >= $punti) {
            $sender->setPunti($sender->getPunti() - $punti);
            $receiver->setPunti($receiver->getPunti() + $punti);
            $pm->update($receiver);
            $pm->update($sender);
            $mail = new PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "la vostra email";
            $mail->Password = "la vostra password";
            $mail->SetFrom("sempre la vostra email");
            $mail->Subject = "BUONO SCONTO";
            $mail->Body = "Questo è un regalo solo per te!";
            $mail->AddAddress("email destinatario");
            $mail->msgHTML(file_get_contents( '..\Smarty\smarty-dir\templates\email-temp.html'));
            if(!$mail->Send()) {
                return false;
            } else {
                return true;
            }
        }
        else{   //gestire eccezione si non si hanno abbastanza punti
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