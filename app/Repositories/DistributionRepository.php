<?php

namespace App\Repositories;

use App\Models\Distribution;

class DistributionRepository {

    public function __construct()
    {
        $this->Distribution = new Distribution();
    }

    public function loadDistribution()
    {
        return $this->Distribution
        ->join('master_data','distributions.process_masterlist_id','=','master_data.process_masterlist_id')
        ->join('users','distributions.distributor_user_id','=','users.id')
        ->join('roles','distributions.picker_user_id','=','roles.id')
        ->where('master_data.process_masterlist_id',2)
        ->get();
    }

    public function create($data)
    {
        return $this->Distribution->create($data);
    }
}