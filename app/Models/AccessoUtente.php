<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AccessoUtente extends Model
{
    use HasFactory;

    protected $table = "accessoUtenti";
    protected $primaryKey = "idAccessoUtente";



    protected $fillable = ["idUtente", "autenticato", "ip"];


    //------PROTECTED--------------------------------------------------------------------------

    /** 
     * Aggiungi tentativo fallito per L'idUtente
     * @param string $idUtente
     */
    public static function aggiungiAccesso($idUtente)
    {
        AccessoUtente::eliminaTentativi($idUtente);
        return AccessoUtente::nuovoRecord($idUtente, 1);
    }

    //--------------------------------------------------------------------------------------------------------------
    /** 
     * Aggiungi tentativo fallito per l'idUtente
     * @param string $idUtente
     */
    public static function aggiungiTentativoFallito($idUtente)
    {
        return AccessoUtente::nuovoRecord($idUtente, 0);
    }

    //--------------------------------------------------------------------------------------------------------------

    /** 
     * Conta quanti tentativi per l'idU$idUtente sono registrati
     * @param string $idUtente
     * @return integer
     */
    public static function contaTentativi($idUtente)
    {
        $tmp = AccessoUtente::where("idUtente", $idUtente)->where("autenticato", 0)->count();
        return $tmp;
    }


    public static function eliminaTentativi($idUtente)
    {
        AccessoUtente::where("idUtente", $idUtente)->delete();
    }
    //--------------------------------------------------------------------------------------------------------------

    /**    Conta quanti tentativi per l'idContatto sono registrati
     * @param string sidContatto
     * @param boolean $autenticato
     * @return App\Models\Accesso
     */
    protected static function nuovoRecord($idUtente, $autenticato)
    {
        $tmp = AccessoUtente::create([
            "idUtente" => $idUtente,
            "autenticato" => $autenticato,
            "ip" => request()->ip()
        ]);
        return $tmp;
    }
}