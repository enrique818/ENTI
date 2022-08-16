<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industria;

class IndustriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industria::create(['nombre' => 'Alimentos', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Arte', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Automovilístico', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Belleza ', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Construcción', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Decoración de hogar', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Deportes', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'E-commerce', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Educación y Libros', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Finanzas', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Joyería', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Hotelería, Turismo y Viajes', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Inmobiliario', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Marketing / Social Media', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Productos para Mascotas', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Otro', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Salud', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Software', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Telecomunicaciones', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Textil', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Transporte', 'descripcion' => 'Vacio']);
        Industria::create(['nombre' => 'Videojuegos', 'descripcion' => 'Vacio']);
    }
}
