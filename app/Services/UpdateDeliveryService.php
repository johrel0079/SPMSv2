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
}