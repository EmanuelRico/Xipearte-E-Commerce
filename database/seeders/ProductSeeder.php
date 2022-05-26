<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Product();
        $p->id = 1;
        $p->name = "producto de prueba";
        $p->description = "Officia non pariatur ipsum anim deserunt cillum. Anim aliqua proident labore cupidatat Lorem reprehenderit cillum amet. Aute proident mollit exercitation qui pariatur.";
        $p->price = 100.0;
        $p->origin = "Incididunt fugiat quis velit Lorem.";
        $p->stock = 7;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 2;
        $p->name = "Vestido Rojo";
        $p->description = "Vestido muy bonito, para dama, tela de manta, elaborado por artesanos profesionales 100 por ciento real no feik full hd 4k";
        $p->price = 335.0;
        $p->origin = "Chiapas";
        $p->stock = 4;
        $p->save();
        unset($p);
    }
}
