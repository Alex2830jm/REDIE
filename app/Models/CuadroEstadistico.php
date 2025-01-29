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
        "unidad_id",
        "numeroCE",
        "nombreCuadroEstadistico",
        "gradoDesagregacion",
        "frecuenciaAct",
    ];

    public function tema() {
        return $this->belongsTo(Grupo::class, 'tema_id');
    }

    public function unidad() {
        return $this->belongsTo(UnidadInformativa::class, 'unidad_id');
    }

    public function dependencia() {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }

    public function archivos() {
        return $this->hasMany(CEArchivos:: class, 'ce_id');
    }
}
