<?php

namespace App\Services;

use App\Repositories\UpdateDeliveryRepository;
use App\Repositories\CheckingRepository;

use Auth;

class UpdateDeliveryService{

    public function __construct(){
        $this->UpdateDeliveryRepository = new UpdateDeliveryRepository();
        $this->CheckingRepository = new CheckingRepository();
    }

    public function show($control_number){
        return $this->UpdateDeliveryRepository->show($control_number);
    }

    public function create($data){
        for($i = 0; $i < count($data['control_number']); $i++)
        {
            $new_data [$i] = 
            [
                'user_id'        => Auth::id(),
                'control_number' => $data['control_number'][$i],
                'created_at' => now(),
            ];

            // 
        }
   
        return $this->CheckingRepository->updateProcessMasterlistPerControl($data['control_number'],6);

         $this->UpdateDeliveryRepository->create($new_data);
    }
}