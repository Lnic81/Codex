<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ContattoAuth extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "utentiAuth";
    protected $primaryKey = "idUtenteAuth";

    protected $fillable = [
        "idUtente",
        "user",
        "sfida",
        "secretJWT",
        "inizioSfida",
        "obbligoCambio"
    ];

    //----- PUBLIC -------------- 

    /**
     * Controlla se esiste l'utente passato
     * 
     * @param string $user
     * @return boolean
    */
    public static function esisteUtenteValidoPerLogin($user){
        $tmp= DB::table('utenti')->join('utentiAuth', 'utenti.idUtente', '=', 'utentiAuth.idUtente')->where('utenti.idStato', '=', 1)->where('utentiAuth.user', '=', $user)->select('utentiAuth.idUtente')->get()->count();
        return ($tmp > 0 ) ? true : false;
    
    }

    /**
     * Controlla se esiste l'utente passatp
     * 
     * @param string $user
     * @return boolean
    */
    public static function esisteUtente($user){
        $tmp = DB::table('utentiAuth')->where('utentiAuth.user', '=', $user)->select('utentiAuth.idUtente')->get()->count();
        return ($tmp >0 ) ? true : false;
    }

}