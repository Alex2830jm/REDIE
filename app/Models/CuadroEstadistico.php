<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuadroEstadistico extends Model
{
    use HasFactory;

    protected $table = "cuadro_estadisticos";
    protected $fillable = [
        "tema_id",
        "dependencia_id",
        "numeroCE",
        "nombreCuadroEstadistico",
        "gradoDesagregacion",
        "frecuenciaAct",
    ];

    public function temas() {
        return $this->belongsTo(Grupo::class, 'tema_id');
    }

    public function dependencia() {
        return $this->belongsTo(AreasUnidad::class, 'dependencia_id');
    }
}
