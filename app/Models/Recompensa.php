<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recompensa extends Model
{
    use HasFactory;

    protected $table = 'recompensas';
    protected $primaryKey = 'CodRecom';
    public $incrementing = true;

    protected $fillable = [
        'Titulo',
        'Descripcion',
        'PuntosNecesarios',
        'EsTemporal',
        'FechaInicio',
        'FechaFin',
        'Stock',
        'imagenurl',
    ];

    protected $casts = [
        'EsTemporal' => 'boolean',
        'FechaInicio' => 'date',
        'FechaFin' => 'date',
        'PuntosNecesarios' => 'integer',
        'Stock' => 'integer',
    ];

    public static function rules()
    {
        return [
            'Titulo' => 'required|string|max:100',
            'Descripcion' => 'required|string',
            'PuntosNecesarios' => 'required|integer|min:0',
            'EsTemporal' => 'boolean',
            'FechaInicio' => 'nullable|required_if:EsTemporal,true|date|before_or_equal:FechaFin',
            'FechaFin' => 'nullable|required_if:EsTemporal,true|date|after_or_equal:FechaInicio',
            'Stock' => 'required|integer|min:1',
            // Opcionalmente puedes validar 'imagenurl' aquí si quieres:
            // 'imagenurl' => 'nullable|url|max:255',
        ];
    }

    public static function messages()
    {
        return [
            'FechaInicio.required_if' => 'La fecha de inicio es obligatoria para recompensas temporales.',
            'FechaFin.required_if' => 'La fecha de fin es obligatoria para recompensas temporales.',
            'Stock.min' => 'El stock mínimo debe ser 1.',
            'PuntosNecesarios.min' => 'Los puntos necesarios no pueden ser negativos.',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('EsTemporal', true)
            ->where('FechaInicio', '<=', now())
            ->where('FechaFin', '>=', now());
    }

    public function scopeAvailable($query)
    {
        return $query->where('Stock', '>', 0);
    }

    public function isActive()
    {
        if (!$this->EsTemporal) return true;
        return now()->between($this->FechaInicio, $this->FechaFin);
    }

    public function isAvailable()
    {
        return $this->Stock > 0;
    }

    public function canjes()
    {
        return $this->hasMany(Canje::class, 'CodRecom', 'CodRecom');
    }
}
