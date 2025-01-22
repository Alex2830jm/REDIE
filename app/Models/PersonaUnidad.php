<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaUnidad extends Model
{
    use HasFactory;
    protected $table = "personas_dependencia";
    protected $fillable = [
        "nombrePersona",
        "profesion",
        "cargo",
    ];


    public function unidad() {
        return $this->belongsTo(UnidadInformativa::class, 'unidad_id');
    }

    public function dependencia() {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
