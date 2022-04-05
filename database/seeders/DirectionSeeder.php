<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new Direction();
        $d->user_id = 1;
        $d->street = "eje vial";
        $d->number1 = "509";
        $d->number2 = "A";
        $d->colony = "Barrio de Tlaxcala";
        $d->cp = "50038";
        $d->reference = "casa roja enfrente de las enchiladas";
        $d->phone_number = "4748137985";
        $d->save();
        unset($d);
        }
}
