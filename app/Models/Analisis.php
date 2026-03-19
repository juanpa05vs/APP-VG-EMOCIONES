<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $table = 'analisis';

    protected $fillable = [
        'partida_id',
        'emocion_detectada',
        'confianza',
        'recomendacion',
    ];

    public function partida()
    {
        return $this->belongsTo(Partida::class);
    }
}