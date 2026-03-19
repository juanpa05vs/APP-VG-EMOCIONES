<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = [
        'user_id',
        'fecha',
        'tiempo_respuesta',
        'observaciones',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class);
    }
}