<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterDataRequest;
use App\Imports\MasterdataImport;
use App\Models\MasterData;
use Excel;
use App\Services\MasterDataService;
use App\Traits\ResponseTrait;
use Auth;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\TicketController;

class MasterDataController extends Controller
{

    use ResponseTrait;

    public function __construct()
    {
        $this->MasterDataService = new MasterDataService();
        $this->TicketController = new TicketController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->successResponse("Loaded Data Successfully");

        try{
            
            $result ["data"] = $this->MasterDataService->loadMasterData();

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
    public function store(MasterDataRequest $request)
    {
        $result = $this->successResponse("Uploaded Successfully");

        $file = $request->file('file');

            try{
        
                $raw_data = Excel::toArray(new MasterdataImport, $file);
                
                $new_data = [];
                foreach($raw_data as $row){
    
                    $new_data = $row;
    
                }
    
                for($i = 1; $i < count($new_data); $i++){

                    $ticket_issue_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($new_data[$i][23]);
                    $delivery_inst_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($new_data[$i][10]);
                    $delivery_due_date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($new_data[$i][30]);
                    
                    $data [] = [
                        'warehouse_class'         => $new_data[$i][0],
                        'delivery_form'           => $new_data[$i][3],
                        'item_no'                 => $new_data[$i][4],
                        'item_rev'                => $new_data[$i][5],
                        'delivery_qty'            => $new_data[$i][7],
                        'stock_address'           => $new_data[$i][8],
                        'manufacturing_no'        => $new_data[$i][9],
                        'delivery_inst_date'      => $delivery_inst_date,
                        'destination_code'        => $new_data[$i][12],
                        'item_name'               => $new_data[$i][14],
                        'product_no'              => $new_data[$i][15],
                        'ticket_no'               => $new_data[$i][18],
                        'ticket_issue_date'       => $ticket_issue_date,
                        'ticket_issue_time'       => $new_data[$i][24],
                        'storage_location'        => $new_data[$i][25],
                        'delivery_due_date'       => $delivery_due_date,
                        'order_download_no'       => $new_data[$i][32],
                        'process_masterlist_id'   => 1
                    ];
                }

            $this->MasterDataService->create($data);
                
            }catch(\Exception $e){
                $result = $this->errorResponse($e);
            }        
            
        return $this->returnResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function show(MasterData $masterData)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterData $masterData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterData $masterData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterData  $masterData
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterData $masterData)
    {
        //
    }

    public function loadTicketIssuance($id)
    {
        $result = $this->successResponse("Loaded Data Successfully");

        try{
            $result ["data"] = $this->MasterDataService->loadTicketIssuance($id);

        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    public function loadTicketControlNumber(Request $request)
    {
        $result = $this->successResponse("Loaded Data Successfully");

        $controlno = $request->controlno;

        try{
            $result ["data"] = $this->MasterDataService->loadTicketControlNumber($controlno);

        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    public function loadBatchTicket(Request $request)
    {

        $result = $this->successResponse("Loaded Data Successfully");

        try{
            $result ["data"] = $this->MasterDataService->loadBatchTicket($request->controlno);

            $this->TicketController->printTicket('asdasds');

        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }
        
        return $this->returnResponse($result);
    }

    public function updateTicketIssuance(Request $request)
    {
        $result = $this->successResponse("Updated Successfully");

        try{
            $result ["data"] = $this->MasterDataService->updateTicketIssuance($request->id,$request->data);

        }catch(\Exception $e){
            $result = $this->errorResponse($e);
        }
        
        return $this->returnResponse($result);
    }
}
