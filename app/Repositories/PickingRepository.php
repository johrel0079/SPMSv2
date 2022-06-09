<?php

namespace App\Repositories;

use App\Models\MasterData;
use App\Models\Distribution;
use App\Models\Picking;


class PickingRepository
{
    public function __construct()
    {
        $this->Picking = new Picking();
        $this->MasterData = new MasterData();
        $this->Distribution = new Distribution();
    }

    public function showPicking($user_id, $ticket_no)
    {
        return $this->MasterData
        ->selectRaw('master_data.id as master_data_id, master_data.*, users.*',)
        ->join('distributions', 'distributions.master_data_id', '=', 'master_data.id')
        ->join('users', 'users.id', '=', 'distributions.picker_user_id')
        ->where('master_data.process_masterlist_id','=',3)
        ->where('master_data.ticket_no','=', $ticket_no)
        ->where('distributions.picker_user_id','=', $user_id)
        ->get();
    }

    public function create($data)
    {
        return $this->Picking->insert($data);
    }


}