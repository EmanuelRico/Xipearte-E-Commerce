<?php

namespace Database\Seeders;

use App\Models\Sold_product;
use Illuminate\Database\Seeder;

class SoldProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Sold_product();
        $s->user_id = 1;
        $s->sale_id = 1;
        $s->product_id = 2;
        $s->cantidad = 1;
        $s->price = 335;
        $s->size = "M";
        $s->final_price = 670.00;
        $s->save();
        unset($s);

        $s = new Sold_product();
        $s->user_id = 1;
        $s->sale_id = 1;
        $s->product_id = 5;
        $s->cantidad = 1;
        $s->price = 235;
        $s->size = "G";
        $s->final_price = 235;
        $s->save();
        unset($s);

        $s = new Sold_product();
        $s->user_id = 1;
        $s->sale_id = 1;
        $s->product_id = 4;
        $s->cantidad = 12;
        $s->price = 235;
        $s->size = "Unitalla";
        $s->final_price = 2820;
        $s->save();
    }
}
