<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SessioneUtente extends Model
{
    use HasFactory;

    protected $table = "sessioniUtente";
    protected $primaryKey = "idSessioneUtente";

    protected $fillable = [
        "idUtente",
        "token",
        "inizioSessione",
    ];

    //---- PUBLIC ------------------------------------------------------------------------
    /** 
     * Aggiorna la sessione per il contatto ed il token passato
     * @param integer $idUtente
     * @param string $token
     */
    public static function aggiornaSessione($idUtente, $tk)
    {
        $where = ["idUtente" => $idUtente, "token" => $tk];
        $arr = ["inizioSessione" => time()];
        DB::table("sessioniUtente")->updateOrInsert($where, $arr);
    }


    //----------------------------------------------------------------------------
    /** 
     * Elimina la sessione per il contatto passato
     * @param integer $idUtente
     */
    public static function eliminaSessione($idUtente)
    {
        DB::table("sessioniUtente")->where("idUtente", $idUtente)->delete();
    }

    //----------------------------------------------------------------------------

    /**   Dati Sessione
     * @param string Stoken
     * @return App\Models\SessioneUtente
     */
    public static function datiSessione($token)
    {
        // echo SessioneUtente::where("token", $token)->exists();

        if (SessioneUtente::esisteSessione($token)) {
            // return DB::table("sessioniUtente") -›where("token", $token) -›first ();
            $record = SessioneUtente::where("token", $token)->first();
            
            return $record;
        } else {
            return null;
        }
    }

    //----------------------------------------------------------------------------
    /**
     * Controlla se esiste la sessione col token passato
     * @param string $token
     * @return boolean
     */
    public static function esisteSessione($token)
    {
        return DB::table("sessioniUtente")->where("token", $token)->exists();
        // return SessioneUtente::where("token", $token)->exists(); sono equivalenti
    }
}