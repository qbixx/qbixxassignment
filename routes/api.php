<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Interfaces\API\Clients\Controllers\DeleteClient;
use App\Enums\RoutesEnum;
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

Route::post('clients/{client}/delete', DeleteClient::class)->name(RoutesEnum::API_DELETE_CLIENTS);


