<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = new Image();
        $i->product_id = 1;
        $i->route = "Incididunt do laborum amet minim nostrud nisi voluptate amet et amet consequat nulla.";
        $i->save();
        unset($i);
    }
}
