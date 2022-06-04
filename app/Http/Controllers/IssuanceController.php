<?php

namespace App\Http\Controllers;

use App\Models\Issuance;
use Illuminate\Http\Request;
use App\Services\IssuanceService;
use App\Traits\ResponseTrait;
use Auth;
class IssuanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ResponseTrait;

    public function __construct()
    {
        $this->IssuanceService = new IssuanceService();
    }

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

            $data = [
                'user_id' => Auth::id(),
                'master_data_id' => $request->master_data_id
            ];

            $result ['data'] = $this->IssuanceService->create($data);
        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function show(Issuance $issuance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function edit(Issuance $issuance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issuance $issuance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issuance  $issuance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issuance $issuance)
    {
        //
    }
}
