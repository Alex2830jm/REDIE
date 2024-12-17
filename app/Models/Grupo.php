<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = "grupos";
    
    
    public function principal() {
        return $this->belongsTo(Grupo::class, 'grupo_padre');
    }

    public function secundario() {
        return $this->hasMany(Grupo::class, 'grupo_padre');
    }
}
