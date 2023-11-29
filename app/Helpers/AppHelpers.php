<?php

namespace App\Helpers;

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Utente;

class AppHelpers
{
    //------ PUBLIC -------------------------------------------------------------------
    /**
     * Toglie il required alle Rules di aggiornamento
     * @param array rules
     * @return array
     */
    public static function aggiornaRegoleHelper($rules)
    {
        $newRules = array_map(function ($value) {
            return str_replace("required|", "", $value);
        }, $rules);
        return $newRules;
    }

    //----------------------------------------------------------------------------------------------------------
    /**
     * Unisci password e sale e fai hash
     *
     * @param string  $testo da cifrare
     * @param string  $chiave usata per cifrare
     * @return string
     */
    public static function cifra($testo, $chiave)
    {
        $testoCifrato = AesCtr::encrypt($testo, $chiave, 256);
        return base64_encode($testoCifrato);
    }

    //----------------------------------------------------------------------------------------------------------
    /**  
     *  Estrae i nomi dei campi della tabella sul DB
     * @param array $tabella
     * @return array
     */
    public static function colonneTabellaDB($tabella)
    {
        $SQL = "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_schema = '" . DB::connection()->getDatabaseName() . "' AND table_name='" . $tabella . "';";
        $tmp = DB::select($SQL);
        return $tmp;
    }
    //----------------------------------------------------------------------------------------------------------
    /** 
     * Estrae i nomi dei campi della tabella sul DB
     * @param string $password
     * @param string $sale
     * @param string $sfida
     * @return array
     */
    public static function creaPasswordCifrata($password, $sale, $sfida)
    {
        $hashPasswordESale = AppHelpers::nascondiPassword($password, $sale);
        $hashFinale = AppHelpers::cifra($hashPasswordESale, $sfida);
        return $hashFinale;
    }

    //----------------------------------------------------------------------------------------------------------
    /**   Toglie il required alle rules di aggiornamento
     * @param string $secretjwT come chiave di cifratura
     * @param integer $idContatto
     * @param string $secretjwT
     * @param integer $usaDa unixtime abilitazione uso token
     * @param integer $scade unixtime scadenza uso token
     * @return string
     */
    public static function creaTokenSessione($idUtente, $secretJWT, $usaDa = null, $scade = null)
    {
        
        $maxTime = 15 * 24 * 60 * 60; // il token scade sempre dopo 15gg max
        $recordContatto = Utente::where("idUtente", $idUtente)->first();
        
        $t = time();

        $nbf = ($usaDa == null) ? $t : $usaDa;
        $exp = ($scade == null) ? $nbf + $maxTime : $scade;
        
        $ruolo = $recordContatto->ruoli[0];   
        $idRuolo = $ruolo->idRuoloUtente;
        $abilita = $ruolo->potere->toArray();
        $abilita = array_map(function ($arr) {
            return $arr["idPotereUtente"];
        }, $abilita);

        // $chiave = $secretJWT; 
        $arr = array(
            "iss" => 'https://www.codex.it',  //url
            "aud" => null,   
            "iat" => $t,   //sfide
            "nbf" => $nbf, //sfide
            "exp" => $exp, //sfide
            "data" => array(
                "idUtente" => $idUtente,
                "idStato" => $recordContatto->idStato,
                "idRuoloUtente" => $idRuolo,
                "potere" => $abilita,
                "nome" => trim($recordContatto->nome . " " . $recordContatto->cognome)
            )
        );



        // $token = JWT::encode ($arr,new Key( $secretJWT, 'HS256'));   vecchio metodo

        $token = JWT::encode($arr, $secretJWT, 'HS256');

        return $token;
    }

    //----------------------------------------------------------------------------------------------------------
    /** Unisci password e sale e fai HASH
     * @param string $testo da decifrare
     * @param string $chiave usata per decifrare
     * @return string
     */
    public static function decifra($testoCifrato, $chiave)
    {
        $testoCifrato = base64_decode($testoCifrato);
        return AesCtr::decrypt($testoCifrato, $chiave, 256);
    }


    //----------------------------------------------------------------------------------------------------------
    /**
     * Controlla se è amministratore
     * @param string $idGruppo
     * @return boolean
     */
    public static function isAdmin($idRuolo)
    {
        return ($idRuolo == 1) ? true : false;
    }


    //----------------------------------------------------------------------------------------------------------
    /** 
     * Unisci password e sale e fai HASH
     * @param string $password
     * @param string $sale
     * @return string
     */
    public static function nascondiPassword($psw, $sale)
    {
        return hash("sha512", $sale . $psw);
    }

    //----------------------------------------------------------------------------------------------------------
    /** Controlla se esiste l'utente passato
     * @param boolean $successo TRUE se la richiesta è andata a buon fine
     * @param integer $codice STATUS CODe della richiesta
     * @param array $dati Dati richiesti
     * @param string $messaggio
     * @param array $errori
     * @return array
     */
    public static function rispostaCustom($dati, $msg = null, $err = null)
    {

        $response = array();
        $response["data"] = $dati;
        if ($msg != null) $response["message"] = $msg;
        if ($err != null) $response["error"] = $err;
        return $response;
    }

    //----------------------------------------------------------------------------------------------------------
    /**  Valida Token
     * @param string $token
     * @param string $messaggio
     * @param array $errori
     * @return object
     */
    public static function validaToken($token, $secretJWT, $sessione)
    {
        // echo $secretJWT;
        $rit = null;
        $payload = JWT::decode($token, new Key($secretJWT, 'HS256'));
        if ($payload->iat <= $sessione->inizioSessione) {
            if ($payload->data->idUtente == $sessione->idUtente) {
                $rit = $payload;
                // echo ("VALIDA 2<br>");
            }
        }
        return $rit;
    }
}