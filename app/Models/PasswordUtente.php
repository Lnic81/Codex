<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordUtente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "passwordUtente";
    protected $primaryKey = "idPasswordUtente";

    protected $fillable = [
        "idUtente",
        "psw",
        "sale"
    ];

    // ---- PUBLIC ----------------------------------

    /**
     * Ritorna il record della password attualmente usata
     * 
     * @param integer $idUtente
     * @return app\model\password
    */

    public static function passwordAttuale($idUtente){
        $record = PasswordUtente::where("idUtente", $idUtente)->orderBy("idPasswordUtente" , "desc")->firstOrFail();
        return $record;
    }


}