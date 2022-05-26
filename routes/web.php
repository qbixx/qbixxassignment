<?php

declare(strict_types=1);

use App\Enums\RoutesEnum;
use Illuminate\Support\Facades\Route;
use Interfaces\Admin\Clients\Controllers\DeleteClient;
use Interfaces\Admin\Clients\Controllers\EditClient;
use Interfaces\Admin\Clients\Controllers\IndexClients;
use Interfaces\Admin\Clients\Controllers\StoreClient;
use Interfaces\Admin\Clients\Controllers\UpdateClient;
use Interfaces\Admin\Items\Controllers\EditItem;
use Interfaces\Admin\Items\Controllers\UpdateItem;
use Interfaces\Base\Locale\Controllers\UpdateLocale;
use Interfaces\Front\Clients\Controllers\ShowClient;
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

Route::post('/locale/{locale}', UpdateLocale::class)->name(RoutesEnum::BASE_UPDATE_LOCALE);

Route::prefix('clients')->group(function () {
    Route::get('{client}/show', ShowClient::class)->name(RoutesEnum::FRONT_SHOW_CLIENT);
});

Route::prefix('admin')->group(function () {
    Route::prefix('clients')->group(function () {
        Route::get('/', IndexClients::class)->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
        Route::inertia('/create', 'Admin/Clients/Create')->name(RoutesEnum::ADMIN_CREATE_CLIENT);
        Route::post('/create', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
        Route::patch('/{client}/update', UpdateClient::class)->name(RoutesEnum::ADMIN_UPDATE_CLIENT);
        Route::get('/{client}/edit', EditClient::class)->name(RoutesEnum::ADMIN_EDIT_CLIENT);
        Route::delete('/{client}/delete', DeleteClient::class)->name(RoutesEnum::ADMIN_DELETE_CLIENT);

        Route::prefix('/{client}/items')->group(function() {
            Route::get('/{item}/edit', EditItem::class)->name(RoutesEnum::ADMIN_EDIT_ITEM);
            Route::patch('/{item}/update', UpdateItem::class)->name(RoutesEnum::ADMIN_UPDATE_ITEM);
        });
    });
});
