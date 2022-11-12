<?php

declare(strict_types=1);

use App\Enums\Inertia\ClientView;
use App\Enums\RoutesEnum;
use Illuminate\Support\Facades\Route;
use Interfaces\Admin\Clients\Controllers\EditClient;
use Interfaces\Admin\Clients\Controllers\IndexClients;
use Interfaces\Admin\Clients\Controllers\ShowClient;
use Interfaces\Admin\Clients\Controllers\StoreClient;
use Interfaces\Admin\Clients\Controllers\UpdateClient;
use Interfaces\API\Languages\Controllers\SetLanguage;
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

Route::get('languages/{languageCode}', SetLanguage::class)
    ->name(RoutesEnum::LANGUAGE_SET);

Route::prefix('admin/clients')->group(function () {
    Route::get('', IndexClients::class)->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
    Route::get('{client}', ShowClient::class)->name(RoutesEnum::ADMIN_SHOW_CLIENT);
    Route::get('{client}/edit', EditClient::class)->name(RoutesEnum::ADMIN_EDIT_CLIENTS);
    Route::post('{client}', UpdateClient::class)->name(RoutesEnum::ADMIN_UPDATE_CLIENTS);
    Route::inertia('create', ClientView::ADMIN_CREATE)->name(RoutesEnum::ADMIN_CREATE_CLIENT);
    Route::post('create', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
});

Route::get('/', WelcomeController::class)->name(RoutesEnum::FRONT_WELCOME);

