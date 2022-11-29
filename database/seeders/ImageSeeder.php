<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = new Image();
        $i->product_id = 1;
        $i->route = "/storage/products/1/FhSeGUdgYFarD6Q83NdhA7WQQKSi0K2ImKGQXdtl.jpg";
        $i->save();
        unset($i);

        $i = new Image();
        $i->product_id = 2;
        $i->route = "/storage/products/2/F0ismNy7Ub8neNvleTdErrH4XpL6NlyT8mEENhBU.jpg";
        $i->save();
        unset($i);

        $i = new Image();
        $i->product_id = 3;
        $i->route = "/storage/products/3/beWOBvWOFOWqHQfOyi1x6jdLXVrnp2FhBRsjd8TA.jpg";
        $i->save();
        unset($i);

        $i = new Image();
        $i->product_id = 4;
        $i->route = "/storage/products/4/r1vtZC86nVqqWZMAt7XJgLNaNbv2yFL6Bv6AN19j.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 5;
        $i->route = "/storage/products/5/luPUQtNY9jlXmQGSF5S3ktDrbgLfoCodPXRuLHYX.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 6;
        $i->route = "/storage/products/6/5m52wdh3g80onagfna9A6BHdMTVLFDMKBWfi66DW.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 7;
        $i->route = "/storage/products/7/5nQoQeM0X2pjHaiityjiQJDpgUunqBKeH4sCmBB5.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 8;
        $i->route = "/storage/products/8/QIfYqkHJCm2a9FSQQc1vZnZ4vJ4vifKFZ8gA4XfP.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 9;
        $i->route = "/storage/products/9/GnYIpDMI2CvmosGudBYjjAXx2XT4auIUQsm0p8rc.jpg";
        $i->save();
        unset($i);
        
        $i = new Image();
        $i->product_id = 10;
        $i->route = "/storage/products/10/er49ciBn3rK2vyPaZh6xtWPH7wAWew8KUtGU8oWq.jpg";
        $i->save();
        unset($i);
    }
}
