<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'Admin', 
            'Picker',
            'Checker',
            'Receiving',
            'Guest'
          ];
  
          for($i=0; $i<count($role); $i++){
              Role::create([
                  'role'  => $role[$i],
              ]);
          }
    }
}
