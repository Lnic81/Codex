<?php

namespace App\Models;

use App\Models\Utente as ModelsUtente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as ClassePerGate;

class Utente extends ClassePerGate
{
    use HasFactory , SoftDeletes;

    protected $table = "utenti";
    protected $primaryKey = "idUtente";

    protected $fillable = [
        "idUtente",
        "nome",      
        "cognome",
        "sesso",
        "idStato",
        "cittadinanza",
        "dataNascita",
        "credito",
    ];




    //------------------------------------------------------------------------------------------------
    public function ruoli(){
        return $this->belongsToMany(ruoloUtente::class, 'utenti_ruoliUtente' , 'idUtente', 'idRuoloUtente');
    }

        // ----------------------------------------------------------------------------------------------------------
    /**
     * Sincronizza i ruoli per il contatto sulla tabella contatti_contattiRuoli
     *
     * @param integer $idContatto
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function sincronizzaContattoRuoli($idUtente, $idRuoli)
    {
        $utente = Utente::where("idUtente", $idUtente)->firstOrFail();
        if (is_string($idRuoli)) {
            $tmp = explode(',', $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        $utente->ruoli()->sync($tmp);
        return $utente->ruoli;
    }
}