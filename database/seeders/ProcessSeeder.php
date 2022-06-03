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
            'for-isuance', 'for-picking', 'for-checking','for-delivery','for-receiving','irregularity'
          ];
  
          for($i=0; $i<count($process); $i++){
              Process::create([
                  'process'  => $process[$i],
              ]);
          }
    }
}
