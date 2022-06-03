<?php

namespace App\Repositories;

use App\Models\Destination;

class DestinationRepository {

    public function __construct(){
        $this->Destination = new Destination();
    }

    public function create($data){
        return $this->Destination->create($data); 
    }

    public function loadDestination(){
        return $this->Destination->all();
    }

    public function showDestination($id){
        return $this->Destination->find($id);
    }

    public function updateDestination($data,$id){
        return $this->Destination->findOrFail($id)->update($data);
    }

    public function deleteDestination($id){
        return $this->Destination->findOrFail($id)->delete();
    }
}