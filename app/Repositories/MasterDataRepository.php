<?php

namespace App\Repositories;

use App\Models\MasterData;

class MasterDataRepository
{
    public function __construct()
    {
        $this->MasterData = new MasterData();
    }

    public function create($data)
    {
        return $this->MasterData->insert($data);
    }

    public function loadMasterData()
    {
        return $this->MasterData->orderBy('id')->get();
    }

    public function loadTicketIssuance($id)
    {
        return $this->MasterData
            ->distinct('order_download_no')
            ->selectRaw('id, order_download_no as control_no, ticket_issue_date as issuance_date, delivery_due_date as delivery_date, destination_code as destination')
            ->where('process_masterlist_id', $id)
            ->orderBy('ticket_issue_date','asc')
            ->orderBy('order_download_no','asc')
            ->get();
    }
    public function showTicket($process_masterlist_id, $ticket_no)
    {
        return $this->MasterData
            ->distinct('order_download_no')
            ->selectRaw('*')
            ->where('process_masterlist_id', $process_masterlist_id)
            ->where('ticket_no', $ticket_no)
            ->get();
    }

    public function loadBatchTicket($ticket)
    {
        return $this->MasterData
            ->distinct('order_download_no')
            ->selectRaw('order_download_no as control_no, ticket_issue_date as issuance_date, delivery_due_date as delivery_date, destination_code as destination')
            ->whereIn('order_download_no',$ticket)
            ->orderBy('order_download_no','asc')
            ->get();
    }

    public function loadTicketControlNumber($controlno)
    {
        return $this->MasterData
            ->selectRaw('*')
            ->where('order_download_no', $controlno)
            ->get();
    }

    public function updateProcessMasterlistId($id, $process_masterlist_id)
    {   
        return $this->MasterData
                ->whereIn('id', $id)
                ->update(['process_masterlist_id' => $process_masterlist_id]);
    }

    public function loadPerId($id) {
        return $this->MasterData
                ->selectRaw('*')
                ->whereIn('id', $id)
                ->get();
            
    }

}