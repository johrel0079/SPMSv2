<?php

namespace App\Http\Controllers;

use App\Services\DestinationService;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    use ResponseTrait;

    public function __construct(){
        $this->DestinationService = new DestinationService();
    }

    public function index()
    {
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->DestinationService->loadDestination();
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
        $result = $this->successResponse("Inserted Successfully");

        try{
            $result ['data'] = $this->DestinationService->create($request->toArray());
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->DestinationService->showDestination($id);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->successResponse("Update Successfully");

        try{
            $result ['data'] = $this->DestinationService->updateDestination($request->toArray(),$id);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->successResponse("Delete Successfully");

        try{
            $result ['data'] = $this->DestinationService->deleteDestination($id);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }
}
