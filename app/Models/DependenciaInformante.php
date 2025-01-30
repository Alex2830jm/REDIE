<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependenciaInformante extends Model
{
    use HasFactory;
    protected $table = "dependencias_informantes";
    protected $guarded = [];

    public function unidades() {
        return $this->hasMany(DependenciaInformante::class, 'padreDI')->where('nivelDI', '=', 2);
    }

    public function dependencia() {
        return $this->belongsTo(DependenciaInformante::class, 'padreDI')->where('nivelDI', '=', 1);
    }

    public function personasInformantes() {
        return $this->hasMany(PersonaUnidad::class, 'di_id');
    }

    public function cuadrosEstadisticos() {
        return $this->hasMany(CuadroEstadistico::class, 'di_id');
    }
}
