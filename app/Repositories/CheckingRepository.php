<?php

namespace App\Repositories;

use App\Models\MasterData;
use App\Models\Checking;


class CheckingRepository
{
    public function __construct()
    {
        $this->Checking = new Checking();
        $this->MasterData = new MasterData();
    }

    public function create($data)
    {
        return $this->Checking->insert($data);
    }

    public function getLastRecord(){
        return $this->Checking
                    ->select('control_number')
                    ->latest()->first();
    }

}