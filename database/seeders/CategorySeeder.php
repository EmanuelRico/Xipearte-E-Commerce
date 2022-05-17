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
        $c -> description = "Duis veniam enim dolore duis id veniam pariatur.";
        $c ->save();
        unset($c);

        $c = new Category();
        $c->id = 2;
        $c -> name = "Vestidos de chiapas";
        $c -> description = "Duis veniam enim dolore duis id veniam pariatur.";
        $c ->save();
    }
}
