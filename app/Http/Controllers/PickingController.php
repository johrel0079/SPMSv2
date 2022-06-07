<?php

namespace App\Http\Controllers;

use App\Models\Picking;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\PickingService;

class PickingController extends Controller
{

    use ResponseTrait;

    public function __construct()
    {
        $this->PickingService = new PickingService();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picking  $picking
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_no)
    {
      
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->PickingService->showPicking($ticket_no);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picking  $picking
     * @return \Illuminate\Http\Response
     */
    public function edit(Picking $picking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picking  $picking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picking $picking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picking  $picking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picking $picking)
    {
        //
    }
}
