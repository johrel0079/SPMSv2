<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\DistributionService;
use Auth;
class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ResponseTrait;

    public function __construct()
    {
        $this->DistributionService = new DistributionService();
    }

    public function index()
    {
        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->DistributionService->loadDistribution();
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
        $data = [
            'picker_user_id' => $request->picker_user_id,
            'master_data_id' => $request->master_data_id,
            'distributor_user_id' => Auth::id()
        ];

        $result = $this->successResponse("Inserted Successfully");

        try{
            $result ['data'] = $this->DistributionService->create($data);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_no)
    {

        $result = $this->successResponse("Load Successfully");

        try{
            $result ['data'] = $this->DistributionService->showDistribution($ticket_no);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        //
    }
}
