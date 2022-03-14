<?php

declare(strict_types=1);

use App\Enums\RoutesEnum;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Interfaces\Admin\Clients\Controllers\CreateClient;
use Interfaces\Admin\Clients\Controllers\DeleteClient;
use Interfaces\Admin\Clients\Controllers\EditClient;
use Interfaces\Admin\Clients\Controllers\IndexClients;
use Interfaces\Admin\Clients\Controllers\StoreClient;
use Interfaces\Admin\Clients\Controllers\UpdateClient;
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
$locale = '';

if (in_array(Request::segment(1), Config::get('app.available_locales'))) {
    $locale = Request::segment(1);
    App::setLocale($locale);
}

Route::group(['prefix' => $locale], function () {
    Route::get('/', WelcomeController::class)->name(RoutesEnum::FRONT_WELCOME);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('clients', IndexClients::class)->name(RoutesEnum::ADMIN_INDEX_CLIENTS);
        Route::get('clients/create', CreateClient::class)->name(RoutesEnum::ADMIN_CREATE_CLIENT);
        Route::post('clients', StoreClient::class)->name(RoutesEnum::ADMIN_STORE_CLIENT);
        Route::get('clients/edit/{client}', EditClient::class)->name(RoutesEnum::ADMIN_EDIT_CLIENT);
        Route::put('clients/{client}', UpdateClient::class)->name(RoutesEnum::ADMIN_UPDATE_CLIENT);
        Route::delete('clients/{client}', DeleteClient::class)->name(RoutesEnum::ADMIN_DELETE_CLIENT);
    });


    Route::get('clients/{client}', ShowClient::class)->name(RoutesEnum::FRONT_SHOW_CLIENT);
});

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');
