<?php

namespace App\Http\Controllers;

use App\Services\PartsForDrService;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Auth;

class PartsForDrController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->PartsForDrService = new PartsForDrService();
    }
    public function index()
    {
        $result = $this->successResponse("Load Ticket Successfully");

        try{
            $result ['data'] = $this->PartsForDrService->index();
            
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartsForDr  $partsForDr
     * @return \Illuminate\Http\Response
     */
    public function show(PartsForDr $partsForDr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartsForDr  $partsForDr
     * @return \Illuminate\Http\Response
     */
    public function edit(PartsForDr $partsForDr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartsForDr  $partsForDr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartsForDr $partsForDr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartsForDr  $partsForDr
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartsForDr $partsForDr)
    {
        //
    }
}
