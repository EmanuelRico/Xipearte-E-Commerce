<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Car();
        $c->id = 1;
        $c->user_id = 1;
        $c->total = 350.0;
        $c->save();
    }
}
