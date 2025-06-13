<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canje extends Model
{
    use HasFactory;

    protected $primaryKey = 'CODCanje';
    public $timestamps = true;

    protected $fillable = [
        'DNI_usuario',
        'CodRecom',
        'PuntosUtilizados',
        'Cantidad'
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