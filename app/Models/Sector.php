<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = "sectores";
    protected $guarded = [];
    

    public function temas() {
        return $this->hasMany(Temas::class, 'sector_id');
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
}
