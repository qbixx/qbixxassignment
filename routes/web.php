<?php

declare(strict_types=1);

use App\Enums\RoutesEnum;
use Illuminate\Support\Facades\Route;
use Interfaces\Admin\Clients\Controllers\IndexClients;
use Interfaces\Admin\Clients\Controllers\StoreClient;
use Interfaces\Front\Landing\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class)->name(RoutesEnum::FRONT_WELCOME);
Route::get('admin/clients', IndexClients::class)->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
Route::inertia('admin/clients/create', 'Admin/Clients/Create')->name(RoutesEnum::ADMIN_CREATE_CLIENT);
Route::post('admin/clients/create', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
