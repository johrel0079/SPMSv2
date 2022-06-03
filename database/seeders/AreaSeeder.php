<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = [
          'WH1', 'WH2', 'WH3'
        ];

        for($i=0; $i<$area.count(); $i++){
            Area::create([
                'area'         => $area[$i],
            ]);
        }
        
    }
}
