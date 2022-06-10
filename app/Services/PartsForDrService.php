<?php

namespace App\Services;

use App\Repositories\PartsForDrRepository;
use App\Repositories\CheckingRepository;

use Auth;

class PartsForDrService{

    public function __construct(){
        $this->PartsForDrRepository = new PartsForDrRepository();
        $this->CheckingRepository = new CheckingRepository();
    }

    public function index(){
        return $this->PartsForDrRepository->index();
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
       
        $this->CheckingRepository->updateProcessMasterlistPerControl($data['control_number'],5);

         $this->PartsForDrRepository->create($new_data);
         return $this->PartsForDrRepository->getMasterData($data['control_number']);
    }
}