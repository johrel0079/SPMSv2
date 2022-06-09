<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\TicketController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user-authenticate', [UserController::class, 'getAuthenticated']);
    Route::get('/logout', [UserController::class, 'logout']);

    Route::resource('/masterdata', MasterDataController::class);
    Route::get('/load-ticket-issuance/{id}',[MasterDataController::class,'loadTicketIssuance']);
    Route::get('load-ticket-control-number',[MasterDataController::class,'loadTicketControlNumber']);
    Route::get('load-batch-ticket',[MasterDataController::class,'loadBatchTicket']);
    Route::patch('/update-ticket-issuance',[MasterDataController::class,'updateTicketIssuance']);

    Route::resource('/area',AreaController::class);
    Route::resource('/destination',DestinationController::class);

    Route::resource('/issuance',IssuanceController::class);

    Route::resource('/distribution', DistributionController::class);
    
  
    Route::get('/load-user',[UserController::class,'index']);
});

Route::get('/print-ticket',[TicketController::class,'printTicket']);
Route::get('/print-dr',[TicketController::class,'printDR']);




