<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s->user_id = 2;
        $s->direccion = '{"Calle":"a","Numero Exterior":"a","Numero Interior":"a","Colonia":"a","Codigo Postal":"1234","Referencias":"a","Municipio":"a","Estado":"a"}';
        $s->total = 3390.00;
        $s->save();
    }
}
