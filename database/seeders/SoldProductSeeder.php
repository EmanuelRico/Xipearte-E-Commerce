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
        $s->products = '{"2":{"name":"Quexquemetl azul","quantity":1,"rImage":"img\/IMG20210508120837.jpg","price":335},"5":{"name":"Blusa blanca bordada","quantity":1,"rImage":"img\/2.jpg","price":235},"4":{"name":"Camisa bordada","quantity":"12","rImage":"img\/1.jpg","price":235}}';
        $s->final_price = 3390.00;
        $s->save();
    }
}
