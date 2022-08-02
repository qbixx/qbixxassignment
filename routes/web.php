<?php

declare(strict_types=1);

use App\Enums\RoutesEnum;
use Illuminate\Support\Facades\Route;
use Interfaces\Admin\Clients\Controllers\IndexClients;
use Interfaces\Admin\Clients\Controllers\StoreClient;
use Interfaces\Admin\Clients\Controllers\EditClient;
use Interfaces\Admin\Clients\Controllers\ViewClient;
use Interfaces\Admin\Clients\Controllers\DeleteClient;
use Interfaces\Admin\Clients\Controllers\UpdateLocale;
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

Route::group(['prefix' => 'admin'], function(){
    
    Route::group(['prefix' => 'clients'], function(){
        Route::get('/', IndexClients::class)->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
        Route::inertia('/create', 'Admin/Clients/Create')->name(RoutesEnum::ADMIN_CREATE_CLIENT);
        Route::post('/create', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
        Route::get('/{client}/edit', [EditClient::class, 'edit'])->name(RoutesEnum::ADMIN_EDIT_CLIENT);
        Route::put('/{client}', [EditClient::class, 'update'])->name(RoutesEnum::ADMIN_UPDATE_CLIENT);
        Route::get('/{client}', ViewClient::class)->name(RoutesEnum::ADMIN_VIEW_CLIENT);
        Route::delete('/{client}', DeleteClient::class)->name(RoutesEnum::ADMIN_DELETE_CLIENT);
    });

    Route::post('/language/{locale}', UpdateLocale::class)
        ->name(RoutesEnum::LOCALE_UPDATE)
        ->where('locale', '[en,fr,nl]+');
});
