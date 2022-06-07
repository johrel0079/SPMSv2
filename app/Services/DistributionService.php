<?php

namespace App\Services;

use App\Repositories\DistributionRepository;
use App\Services\MasterDataService;

class DistributionService{

    public function __construct()
    {
        $this->DistributionRepository = new DistributionRepository();
        $this->MasterDataService = new MasterDataService();
    }

    public function loadDistribution()
    {
       return $this->DistributionRepository->loadDistribution();
    }
    public function showDistribution($ticket_no)
    {
       return $this->MasterDataService->showTicket(2,$ticket_no);
    }

    public function create($data)
    {
        return $this->DistributionRepository->create($data);
    }
}
