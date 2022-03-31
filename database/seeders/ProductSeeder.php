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
        $p->save();
        unset($p);
    }
}
