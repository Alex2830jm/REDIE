<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadInformativa extends Model
{
    use HasFactory;
    protected $table = "unidades_informativas";
    protected $guarded = [];

    public function areas() {
        return $this->hasMany(AreasUnidad::class, 'unidad_id');
    }
}
