<?php

namespace Database\Seeders;

use App\Models\Car_product;
use Illuminate\Database\Seeder;

class Car_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Car_product();
        $c->car_id = 1;
        $c->size_id = 1;
        $c->save();
        unset($c);

        $c = new Car_product();
        $c->car_id = 1;
        $c->size_id = 2;
        $c->save();
        unset($c);

        $c = new Car_product();
        $c->car_id = 1;
        $c->size_id = 3;
        $c->save();
        unset($c);
    }
}
