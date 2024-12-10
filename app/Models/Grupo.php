<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = "grupos";
    protected $guarded = [];
    
    public function sectores() {
        return $this->hasMany(Sector::class, 'grupo_id');
    }
}
