<?php

namespace Database\Seeders;

use App\Models\Product_category;
use Illuminate\Database\Seeder;

class Product_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Product_category();
        $p->product_id = 1;
        $p->category_id = 1;
        $p->save();
        unset($p);

        $p = new Product_category();
        $p->product_id = 2;
        $p->category_id = 2;
        $p->save();
    }
}
