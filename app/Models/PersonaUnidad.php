<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaUnidad extends Model
{
    use HasFactory;
    protected $table = "personas_unidad";
    protected $fillable = [
        "area_id",
        "nombrePersona",
        "profesion",
        "cargo",
    ];


    public function area() {
        return $this->belongsTo(AreasUnidad::class, 'area_id');
    }
}
