<?php

declare(strict_types=1);

use App\Enums\RoutesEnum;
use Illuminate\Support\Facades\Route;
use Interfaces\Front\Landing\WelcomeController;
use Interfaces\Admin\Clients\Controllers\EditClient;
use Interfaces\Admin\Clients\Controllers\ViewClient;
use Interfaces\Admin\Clients\Controllers\StoreClient;
use Interfaces\Admin\Clients\Controllers\CreateClient;
use Interfaces\Admin\Clients\Controllers\DeleteClient;
use Interfaces\Admin\Clients\Controllers\IndexClients;
use Interfaces\Admin\Clients\Controllers\UpdateClient;

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
Route::get('/', function () {
    return redirect()->to('/' . session('locale', 'en'));
});
Route::group(
    ['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']],
    function () {
        Route::get('/', WelcomeController::class)->name(RoutesEnum::FRONT_WELCOME);

        Route::group(
            ['prefix' => 'admin'],
            function () {
                Route::get('clients', IndexClients::class)->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
                Route::get('client/create', CreateClient::class)->name(RoutesEnum::ADMIN_CREATE_CLIENT);
                Route::post('client/create', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
                Route::get('client/{client}/edit', EditClient::class)->name(RoutesEnum::ADMIN_EDIT_CLIENT);
                Route::post('client/{client}/update', UpdateClient::class)->name(RoutesEnum::ADMIN_UPDATE_CLIENT);
                Route::post('client/{client}/delete', DeleteClient::class)->name(RoutesEnum::ADMIN_DELETE_CLIENT);
                Route::get('client/{client}/show', ViewClient::class)->name(RoutesEnum::ADMIN_VIEW_CLIENT);
            }
        );
    }
);
