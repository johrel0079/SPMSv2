<?php

namespace App\Services;

use App\Repositories\DistributionRepository;
use App\Services\MasterDataService;
use App\Repositories\MasterDataRepository;

class DistributionService{

    public function __construct()
    {
        $this->DistributionRepository = new DistributionRepository();
        $this->MasterDataRepository = new MasterDataRepository();
        $this->MasterDataService = new MasterDataService();
    }

    public function loadDistribution()
    {
       return $this->DistributionRepository->loadDistribution();
    }
    public function showDistribution($ticket_no)
    {
       return $this->MasterDataService->showTicket(2,$ticket_no);
    }

    public function create($data)
    {
       
        for($i = 0; $i < count($data['master_data_id']); $i++)
        {
            $new_data [$i] = 
            [
                'picker_user_id' => $data['picker_user_id'],
                'master_data_id' => $data['master_data_id'][$i],
                'distributor_user_id' => $data['distributor_user_id'],
                'created_at' => now(),
            ];
        }
       
        $this->MasterDataRepository->updateProcessMasterlistId($data['master_data_id'],3);

        return $this->DistributionRepository->create($new_data);
    }
}
