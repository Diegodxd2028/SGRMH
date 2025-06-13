<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recompensa;

class RecompensasSeeder extends Seeder
{
    public function run()
    {
        $recompensas = [
            [
                'titulo' => 'Recarga de S/5',
                'descripcion' => 'Gana una recarga gratis por canjear tus puntos!!!',
                'PuntosNecesarios' => 150,
                'Stock' => 50,
                'imagen' => 'img/recargas.png',
            ],
            [
                'titulo' => 'Caja de Agua Cielo',
                'descripcion' => 'Gana un pack de botellas de agua Cielo!!!',
                'PuntosNecesarios' => 200,
                'Stock' => 40,
                'imagen' => 'img/cajacielo.png',
            ],
            [
                'titulo' => 'Canasta para el Hogar',
                'descripcion' => 'Gana una canasta con productos básicos para el hogar!!!',
                'PuntosNecesarios' => 500,
                'Stock' => 20,
                'imagen' => 'img/canasta.jpg',
            ],
            [
                'titulo' => 'Sesión de Fotos Profesional',
                'descripcion' => 'Una sesión de fotos profesional completamente gratis!',
                'PuntosNecesarios' => 600,
                'Stock' => 10,
                'imagen' => 'img/sesiondefotos.jpg',
            ],
            [
                'titulo' => 'Saco de Arroz Tonderito',
                'descripcion' => 'Un saco de arroz Tonderito de regalo.',
                'PuntosNecesarios' => 1000,
                'Stock' => 15,
                'imagen' => 'img/ARROZ-TONDRITO.jpg',
            ],
            [
                'titulo' => 'Pollo Familiar Entero',
                'descripcion' => 'Gana un pollo entero con acompañamientos gratis.',
                'PuntosNecesarios' => 1200,
                'Stock' => 10,
                'imagen' => 'img/pollo.jpg',
            ],
        ];

        foreach ($recompensas as $r) {
            Recompensa::create($r);
        }
    }
}
