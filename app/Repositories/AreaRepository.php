<?php

namespace App\Repositories;

use App\Models\Area;

class AreaRepository {

    public function __construct(){
        $this->Area = new Area();
    }

    public function create($data){
        return $this->Area->create($data); 
    }

    public function loadArea(){
        return $this->Area->all();
    }

    public function showArea($id){
        return $this->Area->find($id)->first();
    }

    public function updateArea($data,$id){
        return $this->Area->findOrFail($id)->update($data);
    }

    public function deleteArea($id){
        return $this->Area->findOrFail($id)->delete();
    }
}