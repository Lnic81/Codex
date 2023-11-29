<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ruoloUtente_potereUtente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "ruoliUtente_poteriUtente";
    protected $primaryKey = "id";

    protected $fillable =[
        "idRuoloUtente",
        "idPotereUtente",
    ];
}