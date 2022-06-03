<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AreaService;
use App\Traits\ResponseTrait;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use ResponseTrait;

    public function __construct(){
        $this->AreaService = new AreaService();
    }


    public function index()
    {
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->AreaService->loadArea();
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
            $result ['data'] = $this->AreaService->create($request->toArray());
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->AreaService->showArea($id);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->successResponse("Update Successfully");

        try{
            $result ['data'] = $this->AreaService->updateArea($request->toArray(),$id);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->successResponse("Delete Successfully");

        try{
            $result ['data'] = $this->AreaService->deleteArea($id);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }
}
