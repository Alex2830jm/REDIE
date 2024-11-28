<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role;

class Temas extends Model
{
    use HasFactory;

    protected $table = "temas";
    protected $guarded = [];


    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class, 'role_has_tema');
        
    }
}
