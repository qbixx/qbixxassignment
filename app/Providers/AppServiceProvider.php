<?php

declare(strict_types=1);

namespace App\Providers;

use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Request $request): void
    {
        if ($request->segment(1)) {
            app()->setLocale($request->segment(1));
            session()->put('locale', $request->segment(1));
        } else {
            if (!session()->has('locale')) {
                app()->setLocale(config('app.locale'));
                session()->put('locale', config('app.locale'));
            }
        }

        Factory::guessFactoryNamesUsing(static function (string $modelName): string {
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });

        Eloquent::unguard();
    }
}
