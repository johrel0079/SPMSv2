<?php

namespace App\Services;

use App\Repositories\CheckingRepository;
use App\Services\MasterDataService;
use App\Repositories\MasterDataRepository;

class CheckingService{

    public function __construct()
    {
        $this->CheckingRepository = new CheckingRepository();
        $this->MasterDataRepository = new MasterDataRepository();
        $this->MasterDataService = new MasterDataService();
    }

    public function showChecking($ticket_no)
    {
       return $this->MasterDataService->showTicket(4,$ticket_no);
    }

    public function create($data)
    {
        $last_control = $this->CheckingRepository->getLastRecord();
        $control =1;
        if($last_control){
            $pieces = explode("-", $last_control['control_number']);
            $control= $pieces[4] + 1;
        }
        $load_data = $this->MasterDataRepository->loadPerId($data['master_data_id']);
        $control_no = $load_data[0]->order_download_no . '-' . $control;

        for($i = 0; $i < count($data['master_data_id']); $i++)
        {
            $new_data [$i] = 
            [
                'user_id'           => $data['user_id'],
                'master_data_id'    => $data['master_data_id'][$i],
                'control_number'    => $control_no, 
                'created_at'        => now(),
            ];
        }
       
        $this->MasterDataRepository->updateProcessMasterlistId($data['master_data_id'],5);

        return $this->CheckingRepository->create($new_data);
    }

}
