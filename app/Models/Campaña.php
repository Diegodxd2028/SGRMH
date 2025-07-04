<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaña extends Model
{
    use HasFactory;

    protected $table = 'campañas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'puntos_campaña',
        'imagen_url',
    ];

    // Relación: una campaña tiene muchos participantes
    public function participantes()
    {
        return $this->belongsToMany(User::class, 'participacion_campañas', 'campaña_id', 'user_id')
                    ->withTimestamps();
    }
}
