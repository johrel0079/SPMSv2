<?php

namespace App\Services;

use App\Repositories\AreaRepository;

class AreaService{

    public function __construct(){
        $this->AreaRepository = new AreaRepository();
    }

    public function create($data){
        return $this->AreaRepository->create($data);
    }

    public function loadArea(){
        return $this->AreaRepository->loadArea();
    }

    public function showArea($id){
        return $this->AreaRepository->showArea($id);
    }

    public function updateArea($data,$id){
        return $this->AreaRepository->updateArea($data,$id);
    }

    public function deleteArea($id){
        return $this->AreaRepository->deleteArea($id);
    }
}