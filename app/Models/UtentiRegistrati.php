<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class utentiRegistrati extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "utentiRegistrati";
    protected $primaryKey = "idUtentiRegistrati";

    protected $fillable = [
        "idUtentiRegistrati",
        "nome",      
        "cognome",
        "sesso",
        "cittadinanza",
        "dataNascita",
    ];

}