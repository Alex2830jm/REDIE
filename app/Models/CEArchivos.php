<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CEArchivos extends Model
{
    use HasFactory;

    protected $table = "ce_archivos";
    protected $guarded = [];

    public function ce(){
        return $this->belongsTo(CuadroEstadistico::class, 'ce_id');
    }
}
