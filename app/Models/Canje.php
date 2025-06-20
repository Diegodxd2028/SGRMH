<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canje extends Model
{
    use HasFactory;

    protected $fillable = [
        'DNI_usuario',
        'CodRecom',
        'PuntosUtilizados',
        'Cantidad',
        'entregado' // ✅ Nuevo campo agregado
    ];

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'DNI_usuario', 'DNI');
    }

    // Relación con Recompensa
    public function recompensa()
    {
        return $this->belongsTo(Recompensa::class, 'CodRecom', 'CodRecom');
    }
}
