<?php

namespace App\Services;

use App\Repositories\MasterDataRepository;

class MasterDataService
{
    public function __construct()
    {
        $this->MasterDataRepository = new MasterDataRepository();
    }

    public function create($data)
    {
        return $this->MasterDataRepository->create($data);
    }

    public function loadMasterData()
    {
        return $this->MasterDataRepository->loadMasterData();
    }

    public function loadTicketIssuance()
    {
       return $this->MasterDataRepository->loadTicketIssuance();
    }

    public function loadTicketControlNumber($controlno)
    {
        return $this->MasterDataRepository->loadTicketControlNumber($controlno);
    }

    public function loadBatchTicket($ticket)
    {
        return $this->MasterDataRepository->loadBatchTicket($ticket);
    }
}