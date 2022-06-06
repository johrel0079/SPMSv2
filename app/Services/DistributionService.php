<?php

namespace App\Services;

use App\Repositories\DistributionRepository;

class DistributionService{

    public function __construct()
    {
        $this->DistributionRepository = new DistributionRepository();
    }

    public function loadDistribution()
    {
       return $this->DistributionRepository->loadDistribution();
    }

    public function create($data)
    {
        return $this->DistributionRepository->create($data);
    }
}
