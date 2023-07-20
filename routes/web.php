<?php

declare(strict_types=1);

use App\Enums\RoutesEnum;
use App\Http\Controllers\Admin\Client\ClientArticleController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Front\Landing\WelcomeController;
use App\Http\Controllers\Front\Client\ViewClientController;
use App\Interfaces\Admin\Clients\Controllers\IndexClients;
use App\Interfaces\Admin\Clients\Controllers\StoreClient;
use Illuminate\Support\Facades\Route;

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

Route::get('clients/{client}', ViewClientController::class);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], static function () {
        Route::resource('clients', ClientController::class)
            ->except(['show']);

        Route::resource('clients.articles', ClientArticleController::class)
            ->only(['create', 'store', 'destroy', 'edit']);

//        Route::get('/', [ClientController::class, 'index'])->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
//        Route::inertia('create', 'Admin/Clients/Create')->name(RoutesEnum::ADMIN_CREATE_CLIENT);
//        Route::get('{id}', [ClientController::class, 'edit'])->name(RoutesEnum::ADMIN_EDIT_CLIENT);
//        Route::post('create', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
//        Route::post('{id}', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
});

