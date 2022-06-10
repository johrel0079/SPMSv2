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
        User::create([
            'employee_number'  => 'Fp143',
            'password'      => bcrypt('Fp143'),
            'first_name'    => 'Jeanel',
            'last_name'     => 'Tadakifa',
            'middle_name'   => 'Flores',
            'position'      => 'Admin',
            'email'         => 'Admin@email.com',
            'area_id'       => 1,
            'role_id'       => 1
        ]);
        User::create([
            'employee_number'  => 12345,
            'password'      => bcrypt('123'),
            'first_name'    => 'Kath',
            'last_name'     => 'Cabudsan',
            'middle_name'   => 'Middlename',
            'position'      => 'Guess',
            'email'         => 'Guess1@email.com',
            'area_id'       => 1,
            'role_id'       => 2
        ]);
        User::create([
            'employee_number'  => 125,
                'password'      => bcrypt('123'),
                'first_name'    => 'Name 2',
                'last_name'     => 'Lastname',
                'middle_name'   => 'Middlename',
                'position'      => 'Guess',
                'email'         => 'Guess2@email.com',
                'area_id'       => 1,
                'role_id'       => 5
        ]);
        User::create([
            'employee_number'  => 126,
                'password'      => bcrypt('123'),
                'first_name'    => 'Name 3',
                'last_name'     => 'Lastname',
                'middle_name'   => 'Middlename',
                'position'      => 'Guess',
                'email'         => 'Guess3@email.com',
                'area_id'       => 1,
                'role_id'       => 5
        ]);
        User::create([
            'employee_number'  => 127,
            'password'      => bcrypt('123'),
            'first_name'    => 'Name 3',
            'last_name'     => 'Lastname',
            'middle_name'   => 'Middlename',
            'position'      => 'Guess',
            'email'         => 'Guess4@email.com',
            'area_id'       => 1,
            'role_id'       => 5
        ]);
    }
}
