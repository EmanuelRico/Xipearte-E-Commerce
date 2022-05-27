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
        $i->route = "img/IMG20210430182017.jpg";
        $i->save();
        unset($i);

        $i = new Image();
        $i->product_id = 2;
        $i->route = "img/IMG20210508120837.jpg";
        $i->save();
        unset($i);
    }
}
