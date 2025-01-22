<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    protected $table = "dependencias";
    protected $fillable = [
        "nombreDependencia",
        "dirrecion",
    ];

    public function unidades() {
        return $this->hasMany(UnidadInformativa::class, 'dependencia_id');
    }

    public function personas() {
        return $this->hasMany(PersonaUnidad::class, 'dependencia_id');
    }
}
