<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate1 = new Rol;
        $cate1->nombre='Administrador';
        $cate1->descripcion='Personal a cargo de administrar el inventario, los usuarios y otras cosas';
        $cate1->save();
        
        $cate2 = new Rol;
        $cate2->nombre='Cliente';
        $cate2->descripcion='Personal a quien se le brinda la atencion y servicio del restaurante';
        $cate2->save();
        
        $cate3 = new Rol;
        $cate3->nombre='Empleado';
        $cate3->descripcion='Personal a cargo de ver pedidos, reservaciones etc';
        $cate3->save();
    }
}
