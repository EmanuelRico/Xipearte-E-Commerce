<?php

namespace Database\Seeders;

use App\Models\Sold_product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(offerSeeder::class);
        $this->call(Product_sizeSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(Car_productSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(Saw_productSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(SoldProductSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
