<?php

namespace App\Repositories;

use App\Models\MasterData;
use App\Models\PartsForDr;
use App\Models\Checking;

class PartsForDrRepository
{
    public function __construct()
    {
        $this->MasterData = new MasterData();
        $this->PartsForDr = new PartsForDr();
        $this->Checking = new Checking();

    }

    public function index()
    {
        return $this->Checking
                ->join('master_data' ,'master_data.id', '=', 'checkings.master_data_id')
                ->selectRaw('DISTINCT(count(checkings.control_number)) AS ticket_count,checkings.control_number,  master_data.destination_code as destination')
                ->groupBy('checkings.control_number')
                ->groupBy('master_data.destination_code')
                ->get();
    }

    public function create($data)
    {
        return $this->PartsForDr->insert($data); 
    }

    public function updateProcessMasterlistId($control_number,$process_masterlist_idr){
        return $this->MasterData
                ->join('checkings', 'checkings.master_data_id', '=', 'master_data.id')
                ->whereIn('checkings.control_no', $control_number)
                ->update(['process_masterlist_id' => $process_masterlist_id]);
    }


}