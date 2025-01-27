<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaUnidad extends Model
{
    use HasFactory;
    protected $table = "personas_dependencia";
    protected $fillable = [
        "dependencia_id",
        "unidad_id",
        "nombrePersona",
        "profesion",
        "area",
        "cargo",
        "telefono",
        "correo",
    ];


    public function unidad() {
        return $this->belongsTo(UnidadInformativa::class, 'unidad_id');
    }

    public function dependencia() {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
