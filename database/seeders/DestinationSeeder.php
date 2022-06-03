<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Destination::truncate();

        $destination = [
            'ASSY1-FDTP',
            'FDTP-CAVITE',
            'FDTP-LAGUNA',
            'ASSY2-FDTP',
            'ASSY2-FDTP',
            'FDTP-PURCH',
            'FDTP-Inspect',
            'ASSY DAMAGE',
            'FDTP-Wareh'];
  
        $char = 'A';
        $num = 305;

        for($i = 0; $i < count($destination); $i++){
            Destination::create([
             'destination' => $destination[$i],
             'attention_to'=> 'MR.'.$char++,
             'destination_class' => $num++
            ]);
        }
          
    }
}
