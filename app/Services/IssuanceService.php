<?php

namespace App\Services;
use App\Repositories\IssuanceRepository;
class IssuanceService{

    public function __construct()
    {
        $this->IssuanceRepository = new IssuanceRepository();
    }

    public function create($data)
    {
        return $this->IssuanceRepository->create($data);
    }
}