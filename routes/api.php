<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\AreaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::resource('/masterdata', MasterDataController::class);

Route::get('load-ticket-issuance',[MasterDataController::class,'loadTicketIssuance']);
Route::get('load-ticket-control-number',[MasterDataController::class,'loadTicketControlNumber']);
Route::get('load-batch-ticket',[MasterDataController::class,'loadBatchTicket']);

Route::resource('/area',AreaController::class);