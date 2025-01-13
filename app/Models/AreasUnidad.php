<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasUnidad extends Model
{
    use HasFactory;
    protected $table = "areas_unidad";
    protected $fillable = [
        "unidad_id",
        "nombreArea"
    ];

    public function unidad() {
        return $this->belongsTo(UnidadInformativa::class, 'unidad_id');
    }

    public function personas() {
        return $this->hasMany(PersonaUnidad::class, 'area_id');
    }
}
