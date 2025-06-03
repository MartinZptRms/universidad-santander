<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sede extends Model
{
    protected $table = 'sedes';

    protected $fillable = [
        'name'
    ];

    public function alumnos() : HasMany {
        return $this->hasMany(Alumno::class);
    }
}
