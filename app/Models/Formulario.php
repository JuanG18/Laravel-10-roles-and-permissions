<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
            'fecha_elaboracion',
            'actividad',
            'nivel_operativo',
            'nivel_financiero',
            'nivel_legal',
            'peso_operativo',
            'peso_financiero',
            'peso_legal',
            'valor_inherente',
            'escala',
            'rto_days',
            'rto_time',
            'rpo_days',
            'rpo_time',
        ];

        protected $casts = [
            'fecha_elaboracion' => 'datetime',
            'rto_time' => 'time',
            'rpo_time' => 'time',
        ];
}
