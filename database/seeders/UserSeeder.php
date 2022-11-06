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
        $u->email = "admin@xipearte.com";
        $u->password = '$2y$10$GYskuDsZOUDFgC8xHr2jqO8opHQifr4jlfjXyQ0m06OMncUVVQBpO';
        $u->type = 2;
        $u->save();
    }
}
