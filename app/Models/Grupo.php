<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = "grupos";
    
    
    public function hijos() {
        return $this->hasMany(Grupo::class, 'grupo_padre', 'id');
    }

    public function padre() {
        return $this->belongsTo(Grupo::class, 'grupo_padre', 'id');
    }

    public function sectores() {
        return $this->hijos()->where('grupo_nivel', '=', '3');
    }

    public function temas() {
        return $this->hijos()->where('grupo_nivel', '=', '4');
    }

    public function temasBySector() {
        return $this->hasManyThrough(
            Grupo::class,
            Grupo::class,
            'grupo_padre',
            'grupo_padre',
            'id',
            'id'
        )->where('grupo_nivel', 4);
    }

    public function cuadros_estadisticos() {
        return $this->hasMany(CuadroEstadistico::class, 'tema_id');
    }
}
