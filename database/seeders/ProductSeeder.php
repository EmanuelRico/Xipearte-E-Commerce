<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Product();
        $p->id = 1;
        $p->name = "Top Tank de Algodón";
        $p->description = "Blusa de algodón bordada a mano";
        $p->price = 150.0;
        $p->origin = "Tenango de Doria Hidalgo";
        $p->originDescription = "Tenango de Doria, Hidalgo";
        $p->stock = 7;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 2;
        $p->name = "Quexquemetl azul";
        $p->description = "Realizado en telar, bordado a mano";
        $p->price = 335.0;
        $p->origin = "Hueyapan Puebla";
        $p->originDescription = "Hueyapan, Puebla";
        $p->stock = 4;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 3;
        $p->name = "Huipil rosa con bordado azul";
        $p->description = "Telar de algodón y bordado a mano";
        $p->price = 285.0;
        $p->origin = "Xochistlahuaca Guerrero";
        $p->originDescription = "Xochistlahuaca Guerrero";
        $p->stock = 4;
        $p->save();
        unset($p);
        
        $p = new Product();
        $p->id = 4;
        $p->name = "Camisa bordada";
        $p->description = "Realizada en manta y bordado de milpa";
        $p->price = 235.0;
        $p->origin = "Zinacantan Chiapas";
        $p->originDescription = "Zinacantan Chiapas";
        $p->stock = 4;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 5;
        $p->name = "Blusa blanca bordada";
        $p->description = "Confeccionada en manta y bodada a mano";
        $p->price = 235.0;
        $p->origin = "Chiapas";
        $p->originDescription = "Chiapas";
        $p->stock = 4;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 6;
        $p->name = "Blusa rosa de manga larga";
        $p->description = "Realizada en manta con bordado de relleno hecho a mano";
        $p->price = 435.0;
        $p->origin = "Chiapas";
        $p->originDescription = "Chiapas";
        $p->stock = 4;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 7;
        $p->name = "Blusa negra bordada";
        $p->description = "Bluza realizada en manta negra con bordado a mano y aplicación hecha en telar";
        $p->price = 135.0;
        $p->origin = "Chiapas";
        $p->originDescription = "Chiapas";
        $p->stock = 4;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 8;
        $p->name = "Vestido Rojo";
        $p->description = "Realizado en manta con tejido en telar, bordado a mano";
        $p->price = 535.0;
        $p->origin = "Zinacantan Chiapas";
        $p->stock = 4;
        $p->originDescription = "Zinacantan Chiapas";
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 9;
        $p->name = "Huipil con bordado de colores";
        $p->description = "Realizado en telar y brocado a mano";
        $p->price = 485.0;
        $p->origin = "Xochistlahuaca Guerrero";
        $p->originDescription = "Xochistlahuaca Guerrero";
        $p->stock = 4;
        $p->save();
        unset($p);

        $p = new Product();
        $p->id = 10;
        $p->name = "Chamarra de mezclilla bordada";
        $p->description = "Chamarra de mezclilla con bordado de gancho";
        $p->price = 755.0;
        $p->origin = "Juchitán";
        $p->originDescription = "Juchitán";
        $p->stock = 4;
        $p->save();
        unset($p);
    }
}
