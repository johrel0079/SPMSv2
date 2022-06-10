<?php

namespace App\Repositories;

use App\Models\MasterData;
use App\Models\Checking;
use App\Models\UpdateDelivery;


class UpdateDeliveryRepository
{
    public function __construct()
    {
        $this->Checking = new Checking();
        $this->MasterData = new MasterData();
        $this->UpdateDelivery = new UpdateDelivery();
    }

    public function show($control_number)
    {
        return $this->Checking
                ->join('master_data' ,'master_data.id', '=', 'checkings.master_data_id')
                ->selectRaw('DISTINCT(count(checkings.control_number)) AS ticket_count,checkings.control_number,  master_data.destination_code as destination')
                ->where('checkings.control_number', $control_number)
                ->where('master_data.process_masterlist_id', 5)
                ->groupBy('checkings.control_number')
                ->groupBy('master_data.destination_code')
                ->get();
        
    }

    public function create($data)
    {
        return $this->UpdateDelivery->insert($data);
    }


}