<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadInformativa extends Model
{
    use HasFactory;
    protected $table = "unidades_informativas";
    protected $fillable = [
        "dependencia_id",
        "nombreUnidad",
        "direccion"
    ];

    public function dependencia() {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }

    public function personasUnidad() {
        return $this->hasMany(PersonaUnidad::class, 'unidad_id');
    }

    public function cuadrosEstadisticos() {
        return $this->hasMany(CuadroEstadistico::class, 'unidad_id');
    }
}
