<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'employee_number'  => 123,
            'password'      => bcrypt('123'),
            'first_name'    => 'Edra',
            'last_name'     => 'Afelo',
            'middle_name'   => 'Flores',
            'position'      => 'Admin',
            'email'         => 'Admin@email.com',
            'area_id'       => 1,
            'role_id'       => 1
            
        ]);
    }
}
