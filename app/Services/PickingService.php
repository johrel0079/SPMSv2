<?php

namespace App\Services;
use App\Repositories\PickingRepository;
use App\Repositories\MasterDataRepository;

use Auth;
class PickingService{

    public function __construct()
    {
        $this->PickingRepository = new PickingRepository();
        $this->MasterDataRepository = new MasterDataRepository();
    }

    public function showPicking($ticket_no)
    {
        $user_id = Auth::id();
        $role_id = Auth::user()->role_id;
        if($role_id == 1){
            return $this->MasterDataRepository->showTicket(3,$ticket_no);
        }else{
            return $this->PickingRepository->showPicking($user_id,$ticket_no);
        }
        
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
       
        $this->MasterDataRepository->updateProcessMasterlistId($data['master_data_id'],4);

        return $this->PickingRepository->create($new_data);
    }
}