<?php

namespace App\Services;

use App\Repositories\PartsForDrRepository;

class PartsForDrService{

    public function __construct(){
        $this->PartsForDrRepository = new PartsForDrRepository();
    }

    public function index(){
        return $this->PartsForDrRepository->index();
    }
}