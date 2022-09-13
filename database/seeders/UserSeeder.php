<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = "admin";
        $u->email = "admin@admin";
        $u->password = '$10$X67vgVQml8nRn4mNSeX0K.OKwcDIs0/NmGA29zBhyCgJjgaT4tORK';
        $u->type = 2;
        $u->save();
    }
}
