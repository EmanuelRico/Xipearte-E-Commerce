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
        $s->product_id = 1;
        $s->sale_id = 1;
        $s->final_price = 100.0;
        $s->save();
    }
}
