<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role;

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
        return $this->hasMany(CuadroEstadistico::class, 'ui_id');
    }

    public function role_dependencia(): BelongsToMany {
        return $this->belongsToMany(Role::class, 'role_has_dependencias', 'dependencia_id', 'role_id');
    }
}
