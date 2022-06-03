<?php

namespace App\Services;

use App\Repositories\DestinationRepository;

class DestinationService{

    public function __construct(){
        $this->DestinationRepository = new DestinationRepository();
    }

    public function create($data){
        return $this->DestinationRepository->create($data);
    }

    public function loadDestination(){
        return $this->DestinationRepository->loadDestination();
    }

    public function showDestination($id){
        return $this->DestinationRepository->showDestination($id);
    }

    public function updateDestination($data,$id){
        return $this->DestinationRepository->updateDestination($data,$id);
    }

    public function deleteDestination($id){
        return $this->DestinationRepository->deleteDestination($id);
    }
}