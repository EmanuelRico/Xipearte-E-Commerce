<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $o = new Offer();
        $o->product_id = 1;
        $o->disccount = 10;
        $o->start = date_create("2022-03-31");
        $o->finish = date_create("2022-08-05");
        $o->save();
        unset($o);
    }
}
