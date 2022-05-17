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
        $c -> name = "Duis veniam enim dolore duis id veniam pariatur.";
        $c->description = "pariatur";
        $c ->save();
        unset($c);

        $c = new Category();
        $c->id = 2;
        $c -> name = "Vestidos de chiapas";
        $c -> description = "Vestidos creados en la region de chiapas del sur de mexico en la localidad de tuxtla";
        $c ->save();
    }
}
