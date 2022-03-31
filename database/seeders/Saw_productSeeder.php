<?php

namespace Database\Seeders;

use App\Models\Saw_product;
use Illuminate\Database\Seeder;

class Saw_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Saw_product();
        $s->product_id = 1;
        $s->user_id = 1;
        $s->save();
    }
}
