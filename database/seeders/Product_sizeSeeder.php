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
        $p -> size = "XG" ;
        $p -> stock = 10;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p ->id = 2;
        $p -> product_id = 1;
        $p -> size = "G" ;
        $p -> stock = 7;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p->id = 3;
        $p -> product_id = 1;
        $p -> size = "CH" ;
        $p -> stock = 0;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "XG" ;
        $p -> stock = 10;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "G" ;
        $p -> stock = 7;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "CH" ;
        $p -> stock = 0;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "M" ;
        $p -> stock = 5;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 2;
        $p -> size = "XCH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 3;
        $p -> size = "CH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 3;
        $p -> size = "G" ;
        $p -> stock = 4;
        $p->save();
        unset($p);
        
        $p = new Product_size();
        $p -> product_id = 4;
        $p -> size = "G" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 4;
        $p -> size = "M" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 4;
        $p -> size = "CH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);
        
        $p = new Product_size();
        $p -> product_id = 5;
        $p -> size = "XG" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 5;
        $p -> size = "G" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 6;
        $p -> size = "M" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 6;
        $p -> size = "CH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);
        
        $p = new Product_size();
        $p -> product_id = 7;
        $p -> size = "CH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 7;
        $p -> size = "XCH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 8;
        $p -> size = "CH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 8;
        $p -> size = "M" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 8;
        $p -> size = "G" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 9;
        $p -> size = "G" ;
        $p -> stock = 4;
        $p->save();
        unset($p);

        $p = new Product_size();
        $p -> product_id = 10;
        $p -> size = "CH" ;
        $p -> stock = 4;
        $p->save();
        unset($p);
    }
}
