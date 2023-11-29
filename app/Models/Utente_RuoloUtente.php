<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class utente_ruoloUtente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "utenti_ruoliUtente";
    protected $primaryKey = "id";

    protected $fillable =[
        "idUtente",
        "idRuoloUtente",

    ];
}