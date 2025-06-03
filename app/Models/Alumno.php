<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = [
        'sede_id',
        'matricula',
        'nombre',
        'apellido',
        'apellido_materno',
        'correo_electronico',
    ];

    protected static function booted()
    {
        static::creating(function ($alumno) {
            $year = Carbon::now()->year;
            $prefix = "UNI{$year}";

            $last = self::where('matricula', 'like', "$prefix%")->orderBy('matricula', 'desc')->value('matricula');
            $newConsecutive = '001';

            if ($last){
                $lastConsecutive = intval(substr($last, -3));
                $newConsecutive = str_pad($lastConsecutive + 1, 3, '0', STR_PAD_LEFT);
            }

            $alumno->matricula = "{$prefix}{$newConsecutive}";
        });
    }

    public function sede() : BelongsTo {
        return $this->belongsTo(Sede::class);
    }
}
