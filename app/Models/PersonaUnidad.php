<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaUnidad extends Model
{
    use HasFactory;
    protected $table = "personas_dependencia";
    protected $fillable = [
        "di_id",
        "nombrePersona",
        "profesionPersona",
        "areaPersona",
        "cargoPersona",
        "telefonoPersona",
        "correoPersona"
    ];


    public function dependencia() {
        return $this->belongsTo(DependenciaInformante::class, 'di_id');
    }
}
