<?php

namespace App\Services;
use App\Repositories\IssuanceRepository;
use App\Repositories\MasterDataRepository;
class IssuanceService{

    public function __construct()
    {
        $this->IssuanceRepository = new IssuanceRepository();
        $this->MasterDataRepository = new MasterDataRepository();
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

        $this->MasterDataRepository->updateProcessMasterlistId($data['master_data_id'],2);

        return $this->IssuanceRepository->create($new_data);

            

    }
}