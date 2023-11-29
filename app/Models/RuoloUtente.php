<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ruoloUtente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "ruoliUtente";
    protected $primaryKey = "idRuoloUtente";

    protected $fillable =[
        "ruolo",
    ];



    //---------------------------------------------------------------------------------------
    public function potere(){
        return $this->belongsToMany(potereUtente::class , 'ruoliUtente_poteriUtente', 'idRuoloUtente', 'idPotereUtente');
    }

        // ----------------------------------------------------------------------------------------------------------
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function utenti()
    {
        return $this->belongsToMany(Utente::class, 'utenti_ruoliUtente', 'idUtente', 'idRuoloUtente');
    }
}