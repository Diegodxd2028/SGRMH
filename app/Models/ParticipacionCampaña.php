<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacionCampaña extends Model
{
    use HasFactory;

    protected $table = 'participacion_campañas';

    protected $fillable = [
        'user_id',
        'campaña_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function campaña()
    {
        return $this->belongsTo(Campaña::class, 'campaña_id');
    }
}
