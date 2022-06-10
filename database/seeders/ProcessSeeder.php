<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Process;
class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $process = [
            'For Issuance', 'For Distribution', 'For Picking', 'For Checking','For Dr','For Delivery'
          ];
  
          for($i=0; $i<count($process); $i++){
              Process::create([
                  'process'  => $process[$i],
              ]);
          }
    }
}
