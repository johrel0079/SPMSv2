<?php

namespace App\Http\Controllers;

use App\Services\UpdateDeliveryService;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Auth;

class UpdateDeliveryController extends Controller
{
    use ResponseTrait;

    public function __construct()
    {
        $this->UpdateDeliveryService = new UpdateDeliveryService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $result = $this->successResponse("Inserted Successfully");

        try{
            $result ['data'] = $this->UpdateDeliveryService->create($request->toArray());
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpdateDelivery  $updateDelivery
     * @return \Illuminate\Http\Response
     */
    public function show($control_number)
    {
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->UpdateDeliveryService->show($control_number);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpdateDelivery  $updateDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateDelivery $updateDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpdateDelivery  $updateDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateDelivery $updateDelivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpdateDelivery  $updateDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateDelivery $updateDelivery)
    {
        //
    }
}
