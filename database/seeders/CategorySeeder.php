<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Category();
        $c->id = 1;
        $c -> name = "Vestidos";
        $c -> description = "Vestidos de diferentes estilos y telas";
        $c ->save();
        unset($c);

        $c = new Category();
        $c->id = 2;
        $c -> name = "Chamarras";
        $c -> description = "Chamarras elaboradas y pintadas a mano";
        $c ->save();

        $c = new Category();
        $c->id = 3;
        $c -> name = "Blusas de manta";
        $c -> description = "Blusas bordadas a mano";
        $c ->save();

        $c = new Category();
        $c->id = 4;
        $c -> name = "Huipil";
        $c -> description = "Bordados a mano";
        $c ->save();
    }
}
