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

    public function loadTicketIssuance($id)
    {
       return $this->MasterDataRepository->loadTicketIssuance($id);
    }

    public function loadTicketControlNumber($controlno)
    {
        return $this->MasterDataRepository->loadTicketControlNumber($controlno);
    }

    public function loadBatchTicket($ticket)
    {
        return $this->MasterDataRepository->loadBatchTicket($ticket);
    }

    public function updateTicketIssuance($id,$data)
    {
        return $this->MasterDataRepository->updateTicketIssuance($id,$data);
    }
    public function showTicket($process_masterlist_id,$ticket_no)
    {
        return $this->MasterDataRepository->showTicket($process_masterlist_id,$ticket_no);
    }
}