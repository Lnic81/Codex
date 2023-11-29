<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class potereUtente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "poteriUtente";
    protected $primaryKey = "idPotereUtente";

    protected $fillable =[
        "nomePotere",
        "potere",
    ];
}