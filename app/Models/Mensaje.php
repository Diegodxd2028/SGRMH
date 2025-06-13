<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'contactos';

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'asunto',
        'mensaje',
        'DNI_usuario' // <- Asegúrate de incluirlo si lo vas a guardar
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'DNI_usuario', 'DNI');
    }
}