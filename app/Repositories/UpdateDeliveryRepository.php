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

    public function monitoring(){
        $this->MasterData
        ->leftJoin('issuances' ,'master_data.id', '=', 'issuances.master_data_id')
        ->leftJoin('distributions' ,'master_data.id', '=', 'distributions.master_data_id')
        ->leftJoin('checkings' ,'master_data.id', '=', 'checkings.master_data_id')
        ->leftJoin('parts_for_drs' ,'parts_for_drs.control_number', '=', 'checkings.control_number')  
        ->leftJoin('update_deliveries' ,'update_deliveries.control_number', '=', 'checkings.control_number')
        ->selectRaw('master_data.*, issuances.created_at as issuance_date, distributions.created_at as distribution_data, checkings.created_at as checking_date,parts_for_drs.created_at as parts_for_dr_date,update_deliveries.created_at as update_delivery_date')  
        ->get();
    }
    public function updateProcessMasterlistId($control_number,$process_masterlist_idr){
        return $this->MasterData
                ->join('checkings', 'checkings.master_data_id', '=', 'master_data.id')
                ->join('update_deliveries', 'checkings.control_number', '=', 'update_deliveries.control_number')
                ->whereIn('checkings.control_no', $control_number)
                ->update(['process_masterlist_id' => $process_masterlist_id]);
    }

}