<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
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
        'rto_hours',
        'rto_minutes',
        'rpo_days',
        'rpo_hours',
        'rpo_minutes',
        'recurso_humano',
        'herramientas',
        'registros_vitales',
        'recomendaciones_recuperacion',

    ];


        protected $casts = [
            'fecha_elaboracion' => 'datetime',


        ];
}
