<?php

namespace App\Repositories;

use App\Models\MasterData;
use App\Models\Checking;


class CheckingRepository
{
    public function __construct()
    {
        $this->Checking = new Checking();
        $this->MasterData = new MasterData();
    }

    public function create($data)
    {
        return $this->Checking->insert($data);
    }

    public function getLastRecord(){
        return $this->Checking
                    ->select('control_number')
                    ->latest()->first();
    }

    public function updateProcessMasterlistPerControl($control_no, $process_id){
        return $this->MasterData
                    ->join('checkings', 'checkings.master_data_id', '=', "master_data.id")
                    ->whereIn('checkings.control_number', $control_no)
                    ->update(['master_data.process_masterlist_id' => $process_id]);
    }
}