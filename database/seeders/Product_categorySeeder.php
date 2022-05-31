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
        $p->product_id = 1;
        $p->category_id = 3;
        $p->save();
        unset($p);

        $p = new Product_category();
        $p->product_id = 2;
        $p->category_id = 4;
        $p->save();

        $p = new Product_category();
        $p->product_id = 3;
        $p->category_id = 4;
        $p->save();

        $p = new Product_category();
        $p->product_id = 4;
        $p->category_id = 3;
        $p->save();

        $p = new Product_category();
        $p->product_id = 5;
        $p->category_id = 3;
        $p->save();

        $p = new Product_category();
        $p->product_id = 6;
        $p->category_id = 3;
        $p->save();

        $p = new Product_category();
        $p->product_id = 7;
        $p->category_id = 3;
        $p->save();

        $p = new Product_category();
        $p->product_id = 8;
        $p->category_id = 1;
        $p->save();

        $p = new Product_category();
        $p->product_id = 9;
        $p->category_id = 4;
        $p->save();

        $p = new Product_category();
        $p->product_id = 10;
        $p->category_id = 2;
        $p->save();
    }
}
