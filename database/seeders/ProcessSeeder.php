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
            'for-isuance', 'for-distribution', 'for-picking','for-checking','for-dr','for-delivery'
          ];
  
          for($i=0; $i<count($process); $i++){
              Process::create([
                  'process'  => $process[$i],
              ]);
          }
    }
}
