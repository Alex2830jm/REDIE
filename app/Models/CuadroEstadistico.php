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
        "di_id",
        "numeroCE",
        "nombreCuadroEstadistico",
        "gradoDesagregacion",
        "frecuenciaAct",
    ];

    public function tema() {
        return $this->belongsTo(Grupo::class, 'tema_id');
    }

    public function informante() {
        return $this->belongsTo(DependenciaInformante::class, 'di_id');
    }

    public function archivos() {
        return $this->hasMany(CEArchivos:: class, 'ce_id');
    }
}
