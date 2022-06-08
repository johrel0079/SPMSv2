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
        $this->Distribution = new Distribution();
    }



}