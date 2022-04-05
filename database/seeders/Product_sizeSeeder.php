<?php

namespace Database\Seeders;

use App\Models\Product_size;
use Illuminate\Database\Seeder;

class Product_sizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Product_size();
        $p->id = 1;
        $p -> product_id = 1;
        $p -> size = "xl" ;
        $p -> stock = 10;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p ->id = 2;
        $p -> product_id = 1;
        $p -> size = "l" ;
        $p -> stock = 7;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p->id = 3;
        $p -> product_id = 1;
        $p -> size = "s" ;
        $p -> stock = 0;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "xl" ;
        $p -> stock = 10;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "l" ;
        $p -> stock = 7;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "s" ;
        $p -> stock = 0;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "m" ;
        $p -> stock = 5;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "xs" ;
        $p -> stock = 4;
        $p->save();
        unset($p);
    }
}
