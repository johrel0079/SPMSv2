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
        return $this->PickingRepository->showPicking($user_id,$ticket_no);
        
    }
}