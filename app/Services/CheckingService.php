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
    
        for($i = 0; $i < count($data['master_data_id']); $i++)
        {
            $new_data [$i] = 
            [
                'user_id' => $data['user_id'],
                'master_data_id' => $data['master_data_id'][$i],
                'created_at' => now(),
            ];
        }
       
        $this->MasterDataRepository->updateProcessMasterlistId($data['master_data_id'],5);

        return $this->CheckingRepository->create($new_data);
    }
}
