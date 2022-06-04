<?php

namespace App\Repositories;

use App\Models\Issuance;

class IssuanceRepository {

    public function __construct()
    {
        $this->Issuance = new Issuance();
    }

    public function create($data)
    {
        return $this->Issuance->create($data);
    }

}
