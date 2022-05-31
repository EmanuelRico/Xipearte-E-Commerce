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

        $i = new Image();
        $i->product_id = 3;
        $i->route = "img/IMG20210508134536.jpg";
        $i->save();
        unset($i);

        $i = new Image();
        $i->product_id = 4;
        $i->route = "img/1.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 5;
        $i->route = "img/2.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 6;
        $i->route = "img/4.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 7;
        $i->route = "img/IMG20210729132926.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 8;
        $i->route = "img/5.jpeg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 9;
        $i->route = "img/6.jpeg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 10;
        $i->route = "img/7.jpeg";
        $i->save();
        unset($i);
    }
}
