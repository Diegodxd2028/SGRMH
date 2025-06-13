<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recompensa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recompensas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'CodRecom';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Titulo',
        'Descripcion',
        'PuntosNecesarios',
        'EsTemporal',
        'FechaInicio',
        'FechaFin',
        'Stock',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'EsTemporal' => 'boolean',
        'FechaInicio' => 'date',
        'FechaFin' => 'date',
        'PuntosNecesarios' => 'integer',
        'Stock' => 'integer',
    ];

    /**
     * Validation rules for the model.
     *
     * @return array
     */
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
        ];
    }

    /**
     * Custom error messages for validation rules.
     *
     * @return array
     */
    public static function messages()
    {
        return [
            'FechaInicio.required_if' => 'La fecha de inicio es obligatoria para recompensas temporales.',
            'FechaFin.required_if' => 'La fecha de fin es obligatoria para recompensas temporales.',
            'Stock.min' => 'El stock mínimo debe ser 1.',
            'PuntosNecesarios.min' => 'Los puntos necesarios no pueden ser negativos.',
        ];
    }

    /**
     * Scope for active temporal rewards (between start and end date).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('EsTemporal', true)
            ->where('FechaInicio', '<=', now())
            ->where('FechaFin', '>=', now());
    }

    /**
     * Scope for rewards with available stock.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('Stock', '>', 0);
    }

    /**
     * Check if the reward is currently active (for temporal rewards).
     *
     * @return bool
     */
    public function isActive()
    {
        if (!$this->EsTemporal) {
            return true; // Non-temporal rewards are always "active"
        }

        return now()->between($this->FechaInicio, $this->FechaFin);
    }

    /**
     * Check if the reward is available (has stock).
     *
     * @return bool
     */
    public function isAvailable()
    {
        return $this->Stock > 0;
    }
}